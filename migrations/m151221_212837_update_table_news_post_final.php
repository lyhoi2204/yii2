<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_212837_update_table_news_post_final extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'post_final', $this->integer(11));
        $this->createIndex('post_final', 'news', 'post_final');
        $this->createIndex('source', 'news', 'source');

    }

    public function down()
    {
        echo "m151221_212837_update_table_news_post_final cannot be reverted.\n";

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
