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
	 public $prijavio;


    public function rules()
    {
        return [
            [['nalogID', 'osID'], 'integer'],
            [['datOtvaranja', 'nazivOs', 'prijavio','datZatvaranja', 'opis', 'statusNaloga'], 'safe'],
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
		$query->innerJoinWith('prijavioNalog as prijavio');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [ 'pageSize' => 8],
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
            ->andFilterWhere(['like', 'prijavio.ime', $this->prijavio])
			->orFilterWhere(['like', 'prijavio.prezime', $this->prijavio])
			->orFilterWhere(['=', 'prijavio.korisnikID', $this->prijavio]);

        return $dataProvider;
    }
}
