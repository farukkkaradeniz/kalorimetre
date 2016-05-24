<?php

namespace farukkkaradeniz\kalorimetre\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use farukkkaradeniz\kalorimetre\models\KaloriTable;

/**
 * KaloriTableSearch represents the model behind the search form about `frontend\modules\admin\models\KaloriTable`.
 */
class KaloriTableSearch extends KaloriTable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kalori'], 'integer'],
            [['userid', 'YemekName', 'meal', 'Tarih'], 'safe'],
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
        $query = KaloriTable::find();

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
            'Tarih' => $this->Tarih,
            'kalori' => $this->kalori,
        ]);

        $query->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'YemekName', $this->YemekName])
            ->andFilterWhere(['like', 'meal', $this->meal]);

        return $dataProvider;
    }
}
