<?php

use yii\db\Schema;
use yii\db\Migration;

class m150711_104721_add_column_user_id_to_theme_table extends Migration
{
    public function up()
    {
        $this->addColumn('theme','user_id','int not null');
    }

    public function down()
    {
        $this->dropColumn('theme','user_id');
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
