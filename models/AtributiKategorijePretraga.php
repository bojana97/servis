<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AtributiKategorije;

/**
 * AtributiKategorijePretraga represents the model behind the search form of `app\models\AtributiKategorije`.
 */
class AtributiKategorijePretraga extends AtributiKategorije
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atrKatID', 'atrID', 'katID'], 'integer'],
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
        $query = AtributiKategorije::find();

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
            'atrKatID' => $this->atrKatID,
            'atrID' => $this->atrID,
            'katID' => $this->katID,
        ]);

        return $dataProvider;
    }
}
