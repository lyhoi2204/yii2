<?php

use yii\db\Schema;
use yii\db\Migration;
use app\helpers\MyDefine;
class m151213_181333_project extends Migration
{
    protected $categories = 'categories' , $type = 'type',
    $news = 'news' , $products = 'products', $pinnedposts = 'pinnedposts', 
    $adslinks = 'adslinks',$ip = 'ip', $pictures = 'pictures' , $info = 'info' , $videos = 'videos';
    
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM';
        $this->createTable($this->categories,[
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                //'title' => $this->string(),
                'slug' => $this->string(),
                'images' => $this->string(),
                'description' => $this->text(),
                'seo_keywords' => $this->string(),
                'seo_title' => $this->string(),
                'source' => $this->string()->defaultValue('cr'),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('status', $this->categories, 'status');


         $this->createTable($this->type,[
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                //'title' => $this->string(),
                'slug' => $this->string(),
                'images' => $this->string(),
                'description' => $this->text(),
                'seo_keywords' => $this->string(),
                'seo_title' => $this->string(),
                'category_id' => $this->integer(11),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'display' => $this->integer(11)->defaultValue(1),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('status', $this->type, 'status');
         $this->createIndex('category_id', $this->type, 'category_id');
         $this->createIndex('display', $this->type, 'display');



         $this->createTable($this->news,[
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                //'title' => $this->string(),
                'slug' => $this->string(),
                'images' => $this->string(),
                'description' => $this->text(),
                'seo_keywords' => $this->string(),
                'seo_title' => $this->string(),
                'type_id' => $this->integer(11),
                'user_id' => $this->integer(11),
                'view_count' => $this->integer(11),
                'hot' => $this->integer(2),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('status', $this->news, 'status');
         $this->createIndex('type_id', $this->news, 'type_id');
         $this->createIndex('user_id', $this->news, 'user_id');


         $this->createTable($this->pinnedposts,[
                'id' => $this->primaryKey(),
                'news_id' => $this->string(),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('news_id', $this->pinnedposts, 'news_id');
         $this->createIndex('status', $this->pinnedposts, 'status');


         $this->createTable($this->adslinks,[
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'title' => $this->string(),
                'images' => $this->string(),
                'url' => $this->string()->notNull(),
                'view_count' => $this->integer(11),
                'location' => $this->string(),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('location', $this->adslinks, 'location');
         $this->createIndex('status', $this->adslinks, 'status');


         $this->createTable($this->ip,[
                'id' => $this->primaryKey(),
                'ip' => $this->string(),
                'news_id' => $this->integer(11),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('news_id', $this->ip, 'news_id');
         $this->createIndex('status', $this->ip, 'status');


         $this->createTable($this->pictures,[
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'images' => $this->string(),
                'news_id' => $this->integer(11),
                'type_id' => $this->integer(11),
                'categories_id' => $this->integer(11),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('news_id', $this->pictures, 'news_id');
         $this->createIndex('type_id', $this->pictures, 'type_id');
         $this->createIndex('categories_id', $this->pictures, 'categories_id');
         $this->createIndex('status', $this->pictures, 'status');


         $this->createTable($this->info,[
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'images' => $this->string(),
                'facebook' => $this->string(),
                'fanpagefb' => $this->string(),
                'skype' => $this->string(),
                'email' => $this->string(),
                'phonenumber' => $this->string(),
                'andress' => $this->string(),
                'description' => $this->text(),
                'website' => $this->string(),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);



         $this->createTable($this->videos,[
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'url' => $this->string()->notNull(),
                'images' => $this->string(),
                'description' => $this->text(),
                'seo_keywords' => $this->string(),
                'seo_title' => $this->string(),
                //'category_id' => $this->integer(11),
                'type_id' => $this->integer(11),
                'user_id' => $this->integer(11),
                'status' => $this->integer(11)->defaultValue(MyDefine::status_enable),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
            ],$tableOptions);
         $this->createIndex('status', $this->videos, 'status');
         //$this->createIndex('category_id', $this->videos, 'category_id');
         $this->createIndex('user_id', $this->videos, 'user_id');
         $this->createIndex('type_id', $this->videos, 'type_id');

        
         


    }

    public function down()
    {
        $this->dropTable($this->categories);
        $this->dropTable($this->type);
        $this->dropTable($this->news);
        $this->dropTable($this->pinnedposts);
        $this->dropTable($this->adslinks);
        $this->dropTable($this->ip);
        $this->dropTable($this->pictures);
        $this->dropTable($this->videos);
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
