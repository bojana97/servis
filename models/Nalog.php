<?php

namespace app\models;

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
            [['osID', 'prijavio', 'zaprimioNalog'], 'required'],
            [['osID', 'prijavio', 'zaprimioNalog', 'izvrsavaNalog'], 'integer'],
            [['datOtvaranja', 'datZatvaranja'], 'safe'],
            [['statusNaloga'], 'string'],
            [['opis'], 'string', 'max' => 255],
            [['osID'], 'exist', 'skipOnError' => true, 'targetClass' => Os::className(), 'targetAttribute' => ['osID' => 'osID']],
            [['prijavio'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['prijavio' => 'korisnikID']],
            [['zaprimioNalog'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['zaprimioNalog' => 'korisnikID']],
            [['izvrsavaNalog'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['izvrsavaNalog' => 'korisnikID']],
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
            'izvrsavaNalog' => Yii::t('app', 'Izvrsava nalog'),
            'datOtvaranja' => Yii::t('app', 'Datum otvaranja naloga'),
            'datZatvaranja' => Yii::t('app', 'Datum zatvaranja naloga'),
            'opis' => Yii::t('app', 'Opis'),
            'statusNaloga' => Yii::t('app', 'Status naloga'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOs()
    {
        return $this->hasOne(Os::className(), ['osID' => 'osID']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZaprimioNalog0()
    {
        return $this->hasOne(Korisnik::className(), ['korisnikID' => 'zaprimioNalog']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzvrsavaNalog0()
    {
        return $this->hasOne(Korisnik::className(), ['korisnikID' => 'izvrsavaNalog']);
    }


	public function getPrijavioNalog()
    {
        return $this->hasOne(Korisnik::className(), ['korisnikID' => 'prijavio']);
    }
}
