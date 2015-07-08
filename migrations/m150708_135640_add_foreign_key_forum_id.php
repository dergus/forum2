<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_135640_add_foreign_key_forum_id extends Migration
{
    public function up()
    {
        $this->addForeignKey('forum_id','theme','forum_id','forum','id','cascade','cascade');
    }

    public function down()
    {
        $this->dropForeignKey('forum_id','theme');

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
