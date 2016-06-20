<?php

use yii\db\Migration;

/**
 * Handles the creation for table `sales`.
 */
class m160616_183532_create_sales extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'date_purchase' => $this->dateTime()->notNull(),
            'cost' => $this->integer()->notNull(),
            'bonus_cards_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_bonus_cards','sales','bonus_cards_id','bonus_cards','id',$delete=null,$update=null);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sales');
    }
}
