<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BonusCards;

/**
 * BonusCardsSearch represents the model behind the search form about `app\models\BonusCards`.
 */
class BonusCardsSearch extends BonusCards
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number', 'sum'], 'integer'],
            [['serial', 'date_release', 'date_expiration', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BonusCards::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'number' => $this->number,
            'date_release' => $this->date_release,
            'date_expiration' => $this->date_expiration,
            'sum' => $this->sum,
        ]);

        $query->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
