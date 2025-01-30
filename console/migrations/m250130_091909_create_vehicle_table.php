<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vehicle}}`.
 */
class m250130_091909_create_vehicle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vehicle}}', [
            'id' => $this->primaryKey(),
            'registration_number' => $this->string(50)->notNull()->unique(), // Unique vehicle registration number
            'make' => $this->string(100)->notNull(),
            'model' => $this->string(100)->notNull(),
            'year' => $this->integer(4)->notNull(),
            'color' => $this->string(50),
            'type' => $this->string(50),
            'capacity' => $this->integer(),
            'route_id' => $this->integer()->null(),
            'user_id' =>$this->integer()->null()
        ]);


        // Add foreign key for route_id
        $this->addForeignKey(
            'fk_vehicle_route_id',  // Foreign key name
            '{{%vehicle}}',          // The table the foreign key is on
            'route_id',              // The column that stores the foreign key
            '{{%route}}',            // The referenced table
            'id',                    // The referenced column
            'SET NULL',              // What to do on delete (in this case, set to NULL)
            'CASCADE'                // What to do on update (cascade changes)
        );

        // Add foreign key for user_id
        $this->addForeignKey(
            'fk_vehicle_user_id',   // Foreign key name
            '{{%vehicle}}',          // The table the foreign key is on
            'user_id',               // The column that stores the foreign key
            '{{%user}}',             // The referenced table
            'id',                    // The referenced column
            'SET NULL',              // What to do on delete (in this case, set to NULL)
            'CASCADE'                // What to do on update (cascade changes)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_vehicle_route_id', '{{%vehicle}}');
        $this->dropForeignKey('fk_vehicle_user_id', '{{%vehicle}}');
        $this->dropTable('{{%vehicle}}');
    }
}
