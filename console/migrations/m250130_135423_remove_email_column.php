<?php

use yii\db\Migration;

/**
 * Class m250130_135423_remove_email_column
 */
class m250130_135423_remove_email_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%profile}}', 'email'); // Specify the column you want to remove

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%profile}}', 'email', $this->string(255)->notNull()->unique());// Recreate the column with the original definition
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250130_135423_remove_email_column cannot be reverted.\n";

        return false;
    }
    */
}
