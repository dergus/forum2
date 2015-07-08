<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_084634_create_user_table extends Migration
{
    public $engine = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
    public function up()
    {   


        $this->createTable('user',[

                'id'=>Schema::TYPE_PK,
                'name'=>Schema::TYPE_STRING,
                'password_hash'=>Schema::TYPE_STRING,
                'email'=>Schema::TYPE_STRING,
                'sex'=>Schema::TYPE_SMALLINT,
                'birthdate'=>Schema::TYPE_DATE,
                'about'=>Schema::TYPE_TEXT,
                'auth_key' => Schema::TYPE_STRING . '(128) NOT NULL',
                'status'=>Schema::TYPE_SMALLINT,
                'rank'=>"enum('1','2','3','4') NOT NULL",
                'last_visit'=>Schema::TYPE_TIMESTAMP,
                'total_time'=>Schema::TYPE_BIGINT,
                'created_at'=>Schema::TYPE_TIMESTAMP,
                'updated_at'=>Schema::TYPE_TIMESTAMP

            ],$this->engine
        );
        $this->createIndex('name','user','name');
        $this->createIndex('email','user','email');

    }

    public function down()
    {
        echo "m150708_084634_create_user_table cannot be reverted.\n";

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
