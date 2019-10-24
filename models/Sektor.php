<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sektor".
 *
 * @property int $sektorID
 * @property string $naziv
 *
 * @property Korisnik[] $korisniks
 */
class Sektor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sektor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naziv'], 'required'],
            [['naziv'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sektorID' => Yii::t('app', 'Sektor ID'),
            'naziv' => Yii::t('app', 'Naziv'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKorisniks()
    {
        return $this->hasMany(Korisnik::className(), ['sektorID' => 'sektorID']);
    }
}
