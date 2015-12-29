<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_175804_update_table_news extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'source', $this->string()->defaultValue('cr'));

    }

    public function down()
    {
        echo "m151221_175804_update_table_news cannot be reverted.\n";

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
