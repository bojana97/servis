<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nalog;

/**
 * NalogPretraga represents the model behind the search form of `app\models\Nalog`.
 */
class NalogPretraga extends Nalog
{
    /**
     * {@inheritdoc}
     */

	 public $nazivOs;
	 public $korisnik;
	 public $serviser;

    public function rules()
    {
        return [
            [['nalogID', 'osID', 'korisnikID', 'zaprimioNalog', 'izvrsavaNalog'], 'integer'],
            [['datOtvaranja', 'nazivOs', 'korisnik','serviser','datZatvaranja', 'opis', 'statusNaloga'], 'safe'],
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
        $query = Nalog::find();
		$query->innerJoinWith('os');
		$query->innerJoinWith('korisnik');
		$query->innerJoinWith('izvrsavaNalog0');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination'=>['pageSize'=>7]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'nalogID' => $this->nalogID,
            'statusNaloga' => $this->statusNaloga,
        ]);

        $query ->andFilterWhere(['like', 'nazivOs', $this->nazivOs])
            ->andFilterWhere(['like', 'serviser.ime', $this->serviser])
			->orFilterWhere(['like', 'serviser.prezime', $this->serviser])
			->andFilterWhere(['like', 'korisnik.ime', $this->korisnik])
			->orFilterWhere(['like', 'korisnik.prezime', $this->korisnik]);

        return $dataProvider;
    }
}
