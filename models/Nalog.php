<?php

namespace app\models;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "nalog".
 *
 * @property int $nalogID
 * @property int $osID
 * @property int $prijavio
 * @property int $zaprimioNalog
 * @property int $izvrsavaNalog
 * @property string $datOtvaranja
 * @property string $datZatvaranja
 * @property string $opis
 * @property string $statusNaloga
 *
 * @property Os $os
 * @property Korisnik $prijavioNalog
 * @property Korisnik $zaprimioNalog0
 * @property Korisnik $izvrsavaNalog0
 */
class Nalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['osID'], 'required'],
            [['osID', 'prijavio', 'zaprimioNalog'], 'integer'],
            [['datOtvaranja', 'datZatvaranja'], 'safe'],
            [['statusNaloga'], 'string'],
			[['statusNaloga'], 'default', 'value'=> 'na cekanju'],
			[['opis'], 'string', 'max' => 255],
            [['osID'], 'exist', 'skipOnError' => true, 'targetClass' => Os::className(), 'targetAttribute' => ['osID' => 'osID']],
            [['prijavio'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['prijavio' => 'korisnikID']],
            [['zaprimioNalog'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['zaprimioNalog' => 'korisnikID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nalogID' => Yii::t('app', 'Nalog ID'),
            'osID' => Yii::t('app', 'ID osnovnog sredstva'),
            'prijavio' => Yii::t('app', 'Prijavio korisnik'),
            'zaprimioNalog' => Yii::t('app', 'Zaprimio nalog'),
            'datOtvaranja' => Yii::t('app', 'Datum otvaranja naloga'),
            'datZatvaranja' => Yii::t('app', 'Datum zatvaranja naloga'),
            'opis' => Yii::t('app', 'Opis kvara'),
            'statusNaloga' => Yii::t('app', 'Status naloga'),
        ];
    }


	public function beforeSave($insert)
	{
		if (!parent::beforeSave($insert)) {
			return false;
		}

		if(!$insert){
			//ako je nalog izvrsen unesi datum zatvaranja naloga
			if($this->statusNaloga == 'Zavrseno'){
				$this->datZatvaranja = new \yii\db\Expression('NOW()');
			}
			
			//ako je nalog tek u obradi, unesi korisnika koji je zaprimio nalog
			if($this->statusNaloga == 'U obradi') {
				$this->zaprimioNalog=Yii::$app->user->getID();
			}
		}
    
		return true;
	}



    public function behaviors()
    {
		return [
		          [
                      'class' => BlameableBehavior::className(),
                      'createdByAttribute' => 'prijavio',
					  'updatedByAttribute'=> false,
                  ],
		];	
    }


 
    public function getOs()
    {
        return $this->hasOne(Os::className(), ['osID' => 'osID']);
    }



    public function getZaprimioNalog0()
    {
        return $this->hasOne(Korisnik::className(), ['korisnikID' => 'zaprimioNalog']);
    }



	public function getPrijavioNalog()
    {
        return $this->hasOne(Korisnik::className(), ['korisnikID' => 'prijavio']);
    }
}
