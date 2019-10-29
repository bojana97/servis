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

	 public $korisnik;
	 public $sektor;
    public function rules()
    {
        return [
            [['korisnikID', 'sektorID'], 'integer'],
            [['ime', 'prezime', 'korisnik', 'sektor', 'telefon', 'email', 'lozinka', 'korisnickoIme'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
		$query->innerJoinWith('sektor');
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


        $query->andFilterWhere(['like', 'ime', $this->korisnik])
            ->orFilterWhere(['like', 'prezime', $this->korisnik])
			->andFilterWhere(['like', 'sektor.naziv', $this->sektor]);

        return $dataProvider;
    }
}
