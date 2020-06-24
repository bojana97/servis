<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Os;
use app\models\Kategorija;

class OsPretraga extends Os
{
	public $kategorija;
	public $nazivInvBroj; 

    public function rules()
    {
        return [
            [['osID','katID'], 'integer'],
            [['invBroj', 'kategorija', 'nazivInvBroj', 'nazivOs'], 'safe'],
        ];
    }

    public function scenarios()
    {
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
        $query = Os::find();
		$query->innerJoinWith('kat');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [ 'pageSize' => 9 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

  

        $query->andFilterWhere(['like', 'kategorija.nazivKat', $this->kategorija])
            ->andFilterWhere(['like', 'nazivOs', $this->nazivInvBroj])
			->orFilterWhere(['=', 'invBroj', $this->nazivInvBroj]);

        return $dataProvider;
    }
}
