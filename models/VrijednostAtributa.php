<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vrijednost_atributa".
 *
 * @property int $vrijAtrID
 * @property int $atrID
 * @property string $vrijednost
 *
 * @property Atribut $atr
 * @property VrijednostOs[] $vrijednostOs
 */
class VrijednostAtributa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vrijednost_atributa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atrID'], 'required'],
            [['atrID'], 'integer'],
            [['vrijednost'], 'string', 'max' => 60],
            [['atrID'], 'exist', 'skipOnError' => true, 'targetClass' => Atribut::className(), 'targetAttribute' => ['atrID' => 'atrID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vrijAtrID' => Yii::t('app', 'Vrij Atr ID'),
            'atrID' => Yii::t('app', 'Atr ID'),
            'vrijednost' => Yii::t('app', 'Vrijednost'),
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
    public function getVrijednostOs()
    {
        return $this->hasMany(VrijednostOs::className(), ['vrijAtrID' => 'vrijAtrID']);
    }
}
