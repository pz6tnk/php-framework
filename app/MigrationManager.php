<?php

namespace pz6\app;

class MigrationManager
{
    private $table = 'migration';
    private $path = '/../migrations';

    /**
     * @var DB
     */
    protected $db;

    public function __construct() {
        $this->db = new DB;
        $this->checkEnvironment();
    }

    public function up($count = 0) {
        $new = $this->getNewMigrations();
        $new = array_slice($new, 0, $count ? (int)$count : count($new));
        if ($new) {
            foreach ($new as $version) {
                echo '    ' . $version . PHP_EOL;
            }
            if ($this->confirm('Apply the above migrations?')) {
                foreach ($new as $version) {
                    echo 'Apply migration ' . $version . PHP_EOL;
                    if ($this->migrateUp($version) === false) {
                        echo 'Failed!' . PHP_EOL;
                        return 1;
                    }
                }
                echo 'Success!' . PHP_EOL;
            }
        } else {
            echo 'All migrations are ready' . PHP_EOL;
        }
        return 0;
    }

    public function down($count = 0) {
        $recent = $this->getRecentMigrations();
        $recent = array_slice($recent, 0, $count ? (int)$count : 1);
        if ($recent) {
            foreach ($recent as $version) {
                echo '    ' . $version . PHP_EOL;
            }
            if ($this->confirm('Revert the above migrations?')) {
                foreach ($recent as $version) {
                    echo 'Revert migration ' . $version . PHP_EOL;
                    if ($this->migrateDown($version) === false) {
                        echo 'Failed!' . PHP_EOL;
                        return 1;
                    }
                }
                echo 'Success!' . PHP_EOL;
            }
        } else {
            echo 'No migrations to revert' . PHP_EOL;
        }
        return 0;
    }

    public function create() {
        $version = gmdate('ymd_His');
        $file = __DIR__ . '/../migrations/' . 'm' . $version . '.php';
        $class = 'm' . $version;
        $content =
            <<<END
<?php

namespace pz6\migrations;

use pz6\app\DB;
use pz6\app\AbstractMigration;

class {$class} extends AbstractMigration.php
{
    public function up() {

    }

    public function down() {

    }
}
END;
        if(file_put_contents($file, $content)) {
            echo 'Create migration ' . $version . PHP_EOL;
        } else {
            echo "Fail";
        };

    }

    public function help() {
        echo <<<END
Usage:
    php migrate.php <action>
Actions:
    up [<count>]
    down [<count>]
    create

END;
    }

    private function confirm($message) {
        echo $message . ' (yes|no) [yes]: ';
        $input = trim(fgets(STDIN));
        return !strncasecmp($input, 'y' , 1);
    }

    private function migrateUp($version) {
        $class = 'pz6\\migrations\\' . $version;
        $migration = new $class();
        if ($migration->up() !== false) {
            //$this->writeUp($version);
            $migrations = new Migration();
            $migrations->migration = $version;
            return $migrations->save();
        }
        return false;
    }

    private function migrateDown($version) {
        $class = 'pz6\\migrations\\' . $version;
        $migration = new $class();
        if ($migration->down() !== false) {
            $migrations = new Migration();
            $migrations->migration = $version;
            return $migrations->delete();
        }
        return false;
    }

    public function getNewMigrations() {
        $migrations = Migration::getAll();
        $files = [];
        foreach (new \DirectoryIterator(__DIR__ . $this->path) as $file) {
            if($file->isDot()) continue;
            $files[] = $file->getBasename('.php');
        }
        foreach($migrations as $name) {
            $search = array_search($name->migration, $files);
            if($search>=0) {
                unset($files[$search]);
            }
        }
        return $files;
    }

    private function getRecentMigrations() {
        $res = [];
        $migrations = Migration::getAll();
        foreach($migrations as $name) {
            $res[] = $name->migration;
        }
        rsort($res);
        return $res;
    }

    private function checkEnvironment() {
        if (!file_exists(__DIR__ . $this->path)) {
            mkdir($this->path);
        }
        $this->db->execute('CREATE TABLE IF NOT EXISTS ' . $this->table . ' (`migration` varchar(64) NOT NULL PRIMARY KEY) ENGINE=MyISAM DEFAULT CHARSET=utf8;');
    }
}