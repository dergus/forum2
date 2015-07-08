<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_140823_create_table_message extends Migration
{
    public function up()
    {
        $this->createTable('message',[
            'id'=>Schema::TYPE_PK,
            'author_id'=>Schema::TYPE_INTEGER,
            'to_user'=>Schema::TYPE_INTEGER,
            'text'=>Schema::TYPE_TEXT,
            'created_at'=>"TIMESTAMP NOT NULL",
            'updated_at'=>"TIMESTAMP NOT NULL",
            'theme_id'=>Schema::TYPE_INTEGER
            ],'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->addForeignKey('author_id','message','author_id','user','id','cascade','cascade');
        $this->addForeignKey('to_user','message','to_user','user','id','cascade','cascade');
        $this->addForeignKey('theme_id','message','theme_id','theme','id','cascade','cascade');
    }

    public function down()
    {
        $this->dropTable('message');
        $this->dropForeignKey('author_id','message');
        $this->dropForeignKey('to_user','message');
        $this->dropForeignKey('theme_id','message');


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
