<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "os".
 *
 * @property int $osID
 * @property string $invBroj
 * @property int $roditeljID
 * @property int $katID
 * @property string $nazivOs
 *
 * @property Nalog[] $nalogs
 * @property Os $roditelj
 * @property Os[] $os
 * @property Kategorija $kat
 * @property VrijednostOs[] $vrijednostOs
 */
class Os extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'os';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			[['osID', 'invBroj'], 'required'],
            [['roditeljID', 'katID'], 'integer'],
            [['invBroj'], 'string', 'max' => 10],
            [['nazivOs'], 'string', 'max' => 40],
            [['invBroj'], 'unique'],
            [['roditeljID'], 'exist', 'skipOnError' => true, 'targetClass' => Os::className(), 'targetAttribute' => ['roditeljID' => 'osID']],
            [['katID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategorija::className(), 'targetAttribute' => ['katID' => 'katID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'osID' => Yii::t('app', 'Os ID'),
            'invBroj' => Yii::t('app', 'Inv Broj'),
            'roditeljID' => Yii::t('app', 'Roditelj ID'),
            'katID' => Yii::t('app', 'Kat ID'),
            'nazivOs' => Yii::t('app', 'Naziv Os'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNalogs()
    {
        return $this->hasMany(Nalog::className(), ['osID' => 'osID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoditelj()
    {
        return $this->hasOne(Os::className(), ['osID' => 'roditeljID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOs()
    {
        return $this->hasMany(Os::className(), ['roditeljID' => 'osID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKat()
    {
        return $this->hasOne(Kategorija::className(), ['katID' => 'katID']);
    }

    /**
     * @return \yii\db\ActiveQuery
    */

    public function getVrijednostOs()
    {
        return $this->hasMany(VrijednostOs::className(), ['osID' => 'osID']);
    }
	


	//pokusaj
	public function getVrijednostAtributa()
    {
        return $this->hasMany(VrijednostAtributa::className(), ['vrijAtrID' => 'vrijAtrID'])
				->via('vrijednostOs');
	}



	public function getInvBroj ()
	{
		return $this->invBroj;
	}


}
