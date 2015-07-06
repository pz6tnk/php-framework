<?php

namespace pz6\app;

abstract class AbstractMigration
{
    abstract public function up();

    abstract public function down();

    protected function createTable($tableName, $columns = [], $column_definition = [])
    {
        $DB = new DB;
        return $DB->execute($this->createTableSQL($tableName, $columns, $column_definition));
    }

    protected function dropTable($tableName)
    {
        $DB = new DB;
        return $DB->execute('DROP TABLE ' . $tableName);
    }
    private function createTableSQL($tableName, $columns = [])
    {
        $sql = 'CREATE TABLE IF NOT EXISTS ' . $tableName;
        $createColumnSQL = '';
        if(!empty($columns)) {
            $createColumnSQL = $this->createColumnSQL($columns);
        }
        $table_options = ' DEFAULT CHARSET=utf8';
        $sql = $sql . $createColumnSQL . $table_options;
        return $sql;
    }

    private function createColumnSQL($columns) {
        $create_definition = '';
        foreach($columns as $column_name => $value) {
            if(is_array($value)) {
                $col_type = $value['type'];
            } else {
                $col_type = $value;
            }
            switch ($col_type) {
                case 'autoincrement':
                    $create_definition[$column_name] = $column_name . ' INT NOT NULL PRIMARY KEY AUTO_INCREMENT';
                    break;
                case 'varchar':
                case 'string':
                    if(!empty($value['length'])) {
                        $length = $value['length'];
                    } else {
                        $length = '256';
                    }
                    $create_definition[$column_name] = $column_name . ' VARCHAR (' . $length . ')';
                    break;
                case 'char':
                    $create_definition[$column_name] = $column_name . ' CHAR';
                    break;
                case 'text':
                    $create_definition[$column_name] = $column_name . ' TEXT';
                    break;
                case 'int':
                case 'integer':
                    $create_definition[$column_name] = $column_name . ' INT';
                    break;
                case 'tinyint':
                    $create_definition[$column_name] = $column_name . ' TINYINT';
                    break;
                case 'smallint':
                    $create_definition[$column_name] = $column_name . ' SMALLINT';
                    break;
                case 'mediumint':
                    $create_definition[$column_name] = $column_name . ' MEDIUMINT';
                    break;
                case 'bigint':
                    $create_definition[$column_name] = $column_name . ' BIGINT';
                    break;
                case 'bool':
                case 'boolean':
                    $create_definition[$column_name] = $column_name . ' BOOLEAN';
                    break;
                case 'float':
                    $create_definition[$column_name] = $column_name . ' FLOAT';
                    break;
                case 'datetime':
                    $create_definition[$column_name] = $column_name . ' DATETIME';
                    break;
                case 'date':
                    $create_definition[$column_name] = $column_name . ' TIME';
                    break;
                case 'timestamp':
                    $create_definition[$column_name] = $column_name . ' TIMESTAMP';
                    break;
            }
        }
        $createColumnSQL = ' (' . implode(', ', $create_definition) . ')';
        return $createColumnSQL;
    }
}