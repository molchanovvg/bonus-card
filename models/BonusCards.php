<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bonus_cards".
 *
 * @property integer $id
 * @property string $serial
 * @property integer $number
 * @property string $date_release
 * @property string $date_expiration
 * @property integer $sum
 * @property string $status
 *
 * @property Relations[] $relations
 */
class BonusCards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bonus_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial', 'number', 'date_release', 'date_expiration', 'sum'], 'required'],
            ['serial', 'match', 'pattern' => '/[a-z0-9]{3,}/'],
            [['number', 'sum'], 'integer'],
            [['date_release', 'date_expiration'], 'safe'],
            [['status'], 'string'],
            [['serial'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial' => 'Serial',
            'number' => 'Number',
            'date_release' => 'Date Release',
            'date_expiration' => 'Date Expiration',
            'sum' => 'Sum',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelations()
    {
        return $this->hasMany(Relations::className(), ['bonus_cards_id' => 'id']);
    }
}
