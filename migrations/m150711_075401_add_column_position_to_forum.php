<?php

use yii\db\Schema;
use yii\db\Migration;

class m150711_075401_add_column_position_to_forum extends Migration
{
    public function up()
    {
        $this->addColumn('forum','position','int not null');
    }

    public function down()
    {
        $this->dropColumn('forum','position');
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
