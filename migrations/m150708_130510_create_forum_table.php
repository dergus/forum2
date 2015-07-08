<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_130510_create_forum_table extends Migration
{
    public function up()
    {

        $this->createTable('forum',[
                'id'=>Schema::TYPE_PK,
                'title'=>Schema::TYPE_STRING." NOT NULL",
                'description'=>Schema::TYPE_TEXT,
                'locked'=>"enum('0','1')",
                'category_id'=>Schema::TYPE_INTEGER,
                'created_at'=>Schema::TYPE_TIMESTAMP


            ],'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->addForeignKey('category_id','forum','category_id','category','id','cascade','cascade');


    }

    public function down()
    {
        $this->dropTable('forum');

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
