<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "korisnik".
 *
 * @property int $korisnikID
 * @property string $ime
 * @property string $prezime
 * @property string $telefon
 * @property string $email
 * @property string $korisnickoIme
 * @property string $lozinka
 * @property int $sektorID
 * @property int $ulogaID
 *
 * @property Sektor $sektor
 * @property Uloga $uloga
 * @property Nalog[] $nalogs
 * @property Nalog[] $nalogs0
 * @property Nalog[] $nalogs1
 */
class Korisnik extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'korisnik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ime', 'prezime', 'email', 'korisnickoIme', 'lozinka', 'sektorID', 'ulogaID'], 'required'],
            [['sektorID', 'ulogaID'], 'integer'],
            [['ime', 'prezime'], 'string', 'max' => 50],
            [['telefon'], 'string', 'max' => 20],
			[['rola'], 'string'],
			[['autentKljuc'], 'string'],
            [['email'], 'string', 'max' => 70],
            [['korisnickoIme'], 'string', 'max' => 60],
            [['lozinka'], 'string', 'max' => 255],
            [['sektorID'], 'exist', 'skipOnError' => true, 'targetClass' => Sektor::className(), 'targetAttribute' => ['sektorID' => 'sektorID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'korisnikID' => Yii::t('app', 'Korisnik ID'),
            'ime' => Yii::t('app', 'Ime'),
            'prezime' => Yii::t('app', 'Prezime'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'korisnickoIme' => Yii::t('app', 'Korisnicko Ime'),
            'lozinka' => Yii::t('app', 'Lozinka'),
            'sektorID' => Yii::t('app', 'Sektor ID'),
			'rola' => Yii::t('app', 'Rola'),
			'autentKljuc'=>Yii::t('app', 'Autentikacijski kljuc'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSektor()
    {
        return $this->hasOne(Sektor::className(), ['sektorID' => 'sektorID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNalogs()
    {
        return $this->hasMany(Nalog::className(), ['prijavio' => 'korisnikID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNalogs0()
    {
        return $this->hasMany(Nalog::className(), ['izvrsavaNalog' => 'korisnikID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNalogs1()
    {
        return $this->hasMany(Nalog::className(), ['izvrsavaNalog' => 'korisnikID']);
    }

	public function getPunoImeKorisnika()
	{
		return Html::encode($this->ime . ' ' .$this->prezime);
	}


	public function getAuthKey(){
		return $this->autentKljuc;

	}

	public function getId(){
		return $this->korisnikID;
	}

	public function validateAuthKey( $authKey ){
		return $this->autentKljuc === $authKey;
	}

	public static function findIdentity($id){
		return self::findOne($id);
	}

	public static function findIdentityByAccessToken( $token, $type=null ){
		throw new \yii\base\NotSupportedException();
	}

	public static function findByUsername( $username ){
		return self::findOne(['korisnickoIme'=> $username]);
	}

	public function validatePassword($password){
		return $this->lozinka === $password;
	}

}
