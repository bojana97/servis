<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Korisnik;

/**
 * KorisnikPretraga represents the model behind the search form of `app\models\Korisnik`.
 */
class KorisnikPretraga extends Korisnik
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['korisnikID', 'sektorID'], 'integer'],
            [['ime', 'prezime', 'telefon', 'email', 'lozinka', 'korisnickoIme'], 'safe'],
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
        $query = Korisnik::find();

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
            'korisnikID' => $this->korisnikID,
            'sektorID' => $this->sektorID,
        ]);

        $query->andFilterWhere(['like', 'ime', $this->ime])
            ->andFilterWhere(['like', 'prezime', $this->prezime])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'lozinka', $this->lozinka])
            ->andFilterWhere(['like', 'korisnickoIme', $this->korisnickoIme]);

        return $dataProvider;
    }
}
