<?php

use yii\db\Schema;
use yii\db\Migration;

class m150711_073209_add_column_position_to_category extends Migration
{
    public function up()
    {


        $this->addColumn('category','position','int not null');

    }

    public function down()
    {
            $this->dropColumn('category','position');
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
