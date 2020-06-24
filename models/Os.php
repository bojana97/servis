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

    public static function tableName()
    {
        return 'os';
    }


    public function rules()
    {
        return [
			[['invBroj', 'katID'], 'required'],
            [['katID'], 'integer'],
            [['invBroj'], 'string', 'max' => 10],
            [['nazivOs'], 'string', 'max' => 40],
            [['invBroj'], 'unique'],
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
            'katID' => Yii::t('app', 'Kat ID'),
            'nazivOs' => Yii::t('app', 'Naziv Os'),
        ];
    }

    public function getNalogs()
    {
        return $this->hasMany(Nalog::className(), ['osID' => 'osID']);
    }



    public function getKat()
    {
        return $this->hasOne(Kategorija::className(), ['katID' => 'katID']);
    }



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
