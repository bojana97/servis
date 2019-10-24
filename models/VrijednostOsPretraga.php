<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VrijednostOs;

/**
 * VrijednostOsPretraga represents the model behind the search form of `app\models\VrijednostOs`.
 */
class VrijednostOsPretraga extends VrijednostOs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vrijOsID', 'vrijAtrID', 'osID'], 'integer'],
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
        $query = VrijednostOs::find();

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
            'vrijOsID' => $this->vrijOsID,
            'vrijAtrID' => $this->vrijAtrID,
            'osID' => $this->osID,
        ]);

        return $dataProvider;
    }
}
