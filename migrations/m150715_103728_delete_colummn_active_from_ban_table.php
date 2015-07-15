<?php

use yii\db\Schema;
use yii\db\Migration;

class m150715_103728_delete_colummn_active_from_ban_table extends Migration
{
    public function up()
    {
        $this->dropColumn('ban','active');
    }

    public function down()
    {
        echo "m150715_103728_delete_colummn_active_from_ban_table cannot be reverted.\n";

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
