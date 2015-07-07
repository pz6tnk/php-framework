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
        $articles->title = 'Sed ut perspiciatis';
        $articles->body = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?';
        return $articles->save();
    }

    public function down() {
        $articles = new Articles();
        $articles->delete();
        $articles->delete();

    }
}