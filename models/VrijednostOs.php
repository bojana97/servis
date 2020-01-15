<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vrijednost_os".
 *
 * @property int $vrijOsID
 * @property int $vrijAtrID
 * @property int $osID
 *
 * @property VrijednostAtributa $vrijAtr
 * @property Os $os
 */
class VrijednostOs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vrijednost_os';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vrijAtrID'], 'required'],
            [['vrijAtrID', 'osID'], 'integer'],
            [['vrijAtrID'], 'exist', 'skipOnError' => true, 'targetClass' => VrijednostAtributa::className(), 'targetAttribute' => ['vrijAtrID' => 'vrijAtrID']],
            [['osID'], 'exist', 'skipOnError' => true, 'targetClass' => Os::className(), 'targetAttribute' => ['osID' => 'osID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vrijOsID' => Yii::t('app', 'Vrij Os ID'),
            'vrijAtrID' => Yii::t('app', 'Vrij Atr ID'),
            'osID' => Yii::t('app', 'Os ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVrijAtr()
    {
        return $this->hasOne(VrijednostAtributa::className(), ['vrijAtrID' => 'vrijAtrID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOs()
    {
        return $this->hasOne(Os::className(), ['osID' => 'osID']);
    }
}
