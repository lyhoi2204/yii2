<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

class m151213_180827_init extends Migration
{
    protected $user = 'user';
    public function up()
    {
        $tableOptions = null;
        


         $this->createTable(User::TABLE, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);

        $this->createIndex('be_user_status', User::TABLE, ['username', 'status']);

        $user = new User();
        $user->username = 'admin';
        $user->email = 'lyhoi.2204@gmail.com';
        $user->setPassword('fuckyou');
        $user->generateAuthKey();
        $user->save();


        $this->createTable('backend_log', [
            'id' => $this->primaryKey(),
            'level' => $this->string(32)->notNull(),
            'category' => $this->string(32)->notNull(),
            'log_time' => $this->integer()->notNull(),
            'prefix' => $this->string(32)->notNull(),
            'message' => $this->text()->notNull()
                ], $tableOptions);



    }

    public function down()
    {
        $this->dropTable($this->user);

        
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
