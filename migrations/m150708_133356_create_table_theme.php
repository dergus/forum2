<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_133356_create_table_theme extends Migration
{
    public function up()
    {

        $this->createTable('theme',[
            'id'=>Schema::TYPE_PK,
            'title'=>Schema::TYPE_STRING,
            'locked'=>"enum('0','1')",
            'fixed'=>"enum('0','1')",
            'forum_id'=>Schema::TYPE_INTEGER,
            'created_at'=>"timestamp",
            'updated_at'=>'timestamp',

            ],'ENGINE=InnoDB DEFAULT CHARSET=utf8');
        

    }

    public function down()
    {
        $this->dropTable('theme');

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
