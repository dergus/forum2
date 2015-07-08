<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_124950_create_category_table extends Migration
{
    public function up()
    {

        $this->createTable('category',[

                'id'=>Schema::TYPE_PK,
                'title'=>Schema::TYPE_STRING." NOT NULL",
                'created_at'=>Schema::TYPE_TIMESTAMP


            ]);

    }

    public function down()
    {
        $this->dropTable('category');

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
