<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Vehicle;

/**
 * VehileSearch represents the model behind the search form of `backend\models\Vehicle`.
 */
class VehileSearch extends Vehicle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'year', 'capacity', 'route_id', 'user_id'], 'integer'],
            [['registration_number', 'make', 'model', 'color', 'type'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Vehicle::find();

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
            'year' => $this->year,
            'capacity' => $this->capacity,
            'route_id' => $this->route_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'registration_number', $this->registration_number])
            ->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
