<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atribut;

/**
 * AtributPretraga represents the model behind the search form of `app\models\Atribut`.
 */
class AtributPretraga extends Atribut
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atrID'], 'integer'],
            [['nazivAtr'], 'safe'],
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
        $query = Atribut::find();

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
            'atrID' => $this->atrID,
        ]);

        $query->andFilterWhere(['like', 'nazivAtr', $this->nazivAtr]);

        return $dataProvider;
    }
}
