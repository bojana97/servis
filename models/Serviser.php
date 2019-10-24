<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "serviser".
 *
 * @property int $serviserID
 * @property string $ime
 * @property string $prezime
 * @property string $telefon
 * @property string $email
 * @property string $korisnickoIme
 * @property string $lozinka
 *
 * @property Nalog[] $nalogs
 * @property Nalog[] $nalogs0
 */
class Serviser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'serviser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serviserID', 'ime', 'prezime', 'korisnickoIme', 'lozinka'], 'required'],
            [['serviserID'], 'integer'],
            [['ime', 'korisnickoIme'], 'string', 'max' => 50],
            [['prezime'], 'string', 'max' => 60],
            [['telefon'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['lozinka'], 'string', 'max' => 255],
            [['serviserID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serviserID' => Yii::t('app', 'Serviser ID'),
            'ime' => Yii::t('app', 'Ime'),
            'prezime' => Yii::t('app', 'Prezime'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
            'korisnickoIme' => Yii::t('app', 'Korisnicko Ime'),
            'lozinka' => Yii::t('app', 'Lozinka'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNalogs()
    {
        return $this->hasMany(Nalog::className(), ['zaprimioNalog' => 'serviserID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNalogs0()
    {
        return $this->hasMany(Nalog::className(), ['izvrsavaNalog' => 'serviserID']);
    }

	public function getPunoImeServisera()
    {
       return Html::encode($this->ime .' ' .$this->prezime);
    }
}
