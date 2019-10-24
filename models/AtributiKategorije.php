<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atributi_kategorije".
 *
 * @property int $atrKatID
 * @property int $atrID
 * @property int $katID
 *
 * @property Atribut $atr
 * @property Kategorija $kat
 */
class AtributiKategorije extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atributi_kategorije';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atrID', 'katID'], 'required'],
            [['atrID', 'katID'], 'integer'],
            [['atrID'], 'exist', 'skipOnError' => true, 'targetClass' => Atribut::className(), 'targetAttribute' => ['atrID' => 'atrID']],
            [['katID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategorija::className(), 'targetAttribute' => ['katID' => 'katID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'atrKatID' => Yii::t('app', 'Atr Kat ID'),
            'atrID' => Yii::t('app', 'Atr ID'),
            'katID' => Yii::t('app', 'Kat ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtr()
    {
        return $this->hasOne(Atribut::className(), ['atrID' => 'atrID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKat()
    {
        return $this->hasOne(Kategorija::className(), ['katID' => 'katID']);
    }
}
