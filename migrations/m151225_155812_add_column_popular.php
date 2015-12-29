<?php

use yii\db\Schema;
use yii\db\Migration;
use app\helpers\MyDefine as My;
class m151225_155812_add_column_popular extends Migration
{
    public function up()
    {
        $this->addColumn('news','popular',$this->integer(11)->defaultValue(My::no)); 
        $this->addColumn('news','alexa',$this->integer(11)->defaultValue(My::no));
        $this->addColumn('news','feature',$this->integer(11)->defaultValue(My::no));

        $this->createIndex('popular', 'news', 'popular');
        $this->createIndex('alexa', 'news', 'alexa');
        $this->createIndex('feature', 'news', 'feature');
    }

    public function down()
    {
        echo "m151225_155812_add_column_popular cannot be reverted.\n";

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
