<?php

use yii\db\Migration;

/**
 * Class m250130_193640_drop_tables
 */
class m250130_193640_drop_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%profile}}');
        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250130_193640_drop_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250130_193640_drop_tables cannot be reverted.\n";

        return false;
    }
    */
}
