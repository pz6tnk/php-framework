<?php

namespace pz6\migrations;

use pz6\app\DB;
use pz6\app\AbstractMigration;

class m140703_103120 extends AbstractMigration
{
    public function up()
    {
        $this->createTable('articles', [
            'id'    => 'autoincrement',
            'title' => [
                'type'      => 'string',
                'length'    => 64
            ],
            'body'  => 'text'
        ]);
    }

    public function down()
    {
        $this->dropTable('articles');
    }
}