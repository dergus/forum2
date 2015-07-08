<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_151919_create_table_ban extends Migration
{
    public function up()
    {
        $this->createTable('ban',[
                'id'=>Schema::TYPE_PK,
                'user_id'=>Schema::TYPE_INTEGER,
                'executor_id'=>Schema::TYPE_INTEGER,
                'reason'=>Schema::TYPE_TEXT,
                'created_at'=>'timestamp not null',
                'duration'=>Schema::TYPE_BIGINT,
                'active'=>'enum("0","1")'

            ],'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->addForeignKey('user_id','ban','user_id','user','id','cascade','cascade');
        $this->addForeignKey('executor_id','ban','executor_id','user','id','cascade','cascade');
    }

    public function down()
    {
        $this->dropTable('ban');

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
