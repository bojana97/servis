<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "korisnik".
 *
 * @property int $korisnikID
 * @property int $sektorID
 * @property string $ime
 * @property string $prezime
 * @property string $telefon
 * @property string $email
 * @property string $lozinka
 * @property string $korisnickoIme
 *
 * @property Sektor $sektor
 * @property Nalog[] $nalogs
 */
class Korisnik extends \yii\db\ActiveRecord
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
            [['sektorID', 'ime', 'prezime', 'korisnickoIme'], 'required'],
            [['sektorID'], 'integer'],
            [['ime', 'korisnickoIme'], 'string', 'max' => 50],
            [['prezime'], 'string', 'max' => 60],
            [['telefon'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
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
            'sektorID' => Yii::t('app', 'Sektor ID'),
            'ime' => Yii::t('app', 'Ime'),
            'prezime' => Yii::t('app', 'Prezime'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'lozinka' => Yii::t('app', 'Lozinka'),
            'korisnickoIme' => Yii::t('app', 'Korisnicko Ime'),
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
        return $this->hasMany(Nalog::className(), ['korisnikID' => 'korisnikID']);
    }

	public function getPunoImeKorisnika()
	{
		return Html::encode($this->ime. ' ' .$this->prezime);
	}
}
