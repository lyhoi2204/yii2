<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_183901_update_index extends Migration
{
    public function up()
    {
        $this->createIndex('images', 'news', 'images');
        $this->createIndex('created_at', 'news', 'created_at');
        $this->createIndex('updated_at', 'news', 'updated_at');
        $this->createIndex('hot', 'news', 'hot');
        $this->createIndex('view_count', 'news', 'view_count');

    }

    public function down()
    {
        echo "m151223_183901_update_index cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
