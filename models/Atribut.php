<?php

namespace app\models;

use Yii;
use app\base\Model;

/**
 * This is the model class for table "atribut".
 *
 * @property int $atrID
 * @property string $nazivAtr
 *
 * @property AtributiKategorije[] $atributiKategorijes
 * @property VrijednostAtributa[] $vrijednostAtributas
 */
class Atribut extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atribut';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazivAtr'], 'required', 'message'=>'Polje ne smije biti prazno!'],
            [['nazivAtr'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'atrID' => Yii::t('app', 'Atr ID'),
            'nazivAtr' => Yii::t('app', 'Naziv Atr'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtributiKategorijes()
    {
        return $this->hasMany(AtributiKategorije::className(), ['atrID' => 'atrID']);
    }

	public function getKategorije(){
		return $this->hasMany(Kategorija::className(), ['katID' => 'katID'] )
				->viaTable('atributi_kategorije', ['atrID' => 'atrID'] );
	}


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVrijednostAtributas()
    {
        return $this->hasMany(VrijednostAtributa::className(), ['atrID' => 'atrID']);
    }

	public static function getPa($model){
	print_r($model);
		return self::render('update', [
            'model' => $model,
        ]);}
}
