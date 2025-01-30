<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%route}}`.
 */
class m250130_091415_create_route_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%route}}', [
            'id' => $this->primaryKey(),
            'route_name'=>$this->string()->notNull()->unique(),
            'route_description'=>$this->text()->notNull(),
            'distance'=>$this->integer()->notNull(),
            'peak_hours_rate'=>$this->integer()->notNull(),
            'off_peak_hours_rate'=>$this->integer()->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%route}}');
    }
}
