<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 */
class m250130_093425_create_profile_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),  // Foreign key to user table
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'phone_number' => $this->string(20),
            'address' => $this->text(),
            'role' => $this->string(20)->notNull(), // Role of the user (admin, driver)
            'driver_license_number' => $this->string(50)->null(), // Specific to drivers
            'vehicle_assigned' => $this->integer()->null(), // Specific to drivers
            'admin_area_of_responsibility' => $this->string(100)->null(), // Specific to admins
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Add a foreign key to the `user` table
        $this->addForeignKey(
            'fk_profile_user_id',  // Foreign key name
            '{{%profile}}',         // The table the foreign key is on
            'user_id',              // The column that stores the foreign key
            '{{%user}}',            // The referenced table
            'id',                   // The referenced column
            'CASCADE',              // Action on delete
            'CASCADE'               // Action on update
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the foreign key first
        $this->dropForeignKey('fk_profile_user_id', '{{%profile}}');

        // Then drop the profile table
        $this->dropTable('{{%profile}}');
    }
}
