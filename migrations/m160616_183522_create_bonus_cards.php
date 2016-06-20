<?php

use yii\db\Migration;

/**
 * Handles the creation for table `bonus_cards`.
 */
class m160616_183522_create_bonus_cards extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bonus_cards', [
            'id' => $this->primaryKey(),
            'serial' => $this->string()->notNull(),
            'number' => $this->integer()->notNull(),
            'date_release' => $this->dateTime()->notNull(),
            'date_expiration' => $this->dateTime()->notNull(),
            'sum' => $this->integer()->notNull(),
            'status' => "enum('activate', 'not_activate', 'overdue') NOT NULL DEFAULT 'not_activate'",
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bonus_cards');
    }
}
