<?php

namespace pz6\migrations;

use pz6\app\DB;
use pz6\app\Migration;

class m140703_103120 extends Migration
{
    public function up() {
        $DB = new DB();
        $sql = 'CREATE TABLE IF NOT EXISTS articles (`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT, `title` varchar(64), `body` text) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
        return $DB->execute($sql);
    }

    public function down() {
        $DB = new DB();
        $sql = 'DROP TABLE articles';
        return $DB->execute($sql);
    }
}