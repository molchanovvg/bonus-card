<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property string $date_purchase
 * @property integer $cost
 * @property integer $bonus_cards_id
 *
 * @property BonusCards $bonusCards
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_purchase', 'cost', 'bonus_cards_id'], 'required'],
            [['date_purchase'], 'safe'],
            [['cost', 'bonus_cards_id'], 'integer'],
            [['bonus_cards_id'], 'exist', 'skipOnError' => true, 'targetClass' => BonusCards::className(), 'targetAttribute' => ['bonus_cards_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_purchase' => 'Date Purchase',
            'cost' => 'Cost',
            'bonus_cards_id' => 'Bonus Cards ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonusCards()
    {
        return $this->hasOne(BonusCards::className(), ['id' => 'bonus_cards_id']);
    }
}
