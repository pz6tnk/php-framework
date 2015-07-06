<?php

namespace pz6\migrations;

use pz6\app\DB;
use pz6\app\AbstractMigration;
use pz6\models\Articles;

class m150703_133130 extends AbstractMigration
{
    public function up() {
        $articles = new Articles();
        $articles->title = 'Lorem ipsum';
        $articles->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sagittis fermentum viverra. Aliquam tempus libero quis viverra dictum. Integer ullamcorper varius libero, nec fermentum urna. Phasellus auctor purus in porttitor iaculis. Nunc dictum sapien sapien, at accumsan ligula vulputate sed. Nullam in pulvinar libero, sed imperdiet nulla. Aliquam molestie fermentum blandit. Ut viverra mattis nisi id aliquam. Ut ultricies aliquam luctus. Vestibulum malesuada id massa ac lacinia. Duis pulvinar finibus pharetra. Duis ullamcorper augue sed tellus finibus, sed tempor metus consequat.';
        $articles->save();
        return $articles->save();
    }

    public function down() {
        $articles = new Articles();
        $articles->delete();
        $articles->delete();

    }
}