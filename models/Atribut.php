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


	public function getKategorije(){
		return $this->hasMany(Kategorija::className(), ['katID' => 'katID'] )
				->viaTable('atributi_kategorije', ['atrID' => 'atrID'] );
	}


  
    public function getVrijednostAtributas()
    {
        return $this->hasMany(VrijednostAtributa::className(), ['atrID' => 'atrID']);
    }



	public static function getAtributByName($nazivAtributa)
    {
        $atribut = Atribut::find()->where(['nazivAtr' => $nazivAtributa])->one();
        if (!$atribut) {
            $atribut = new Atribut();
            $atribut->nazivAtr = $nazivAtributa;
            $atribut->save(false);
        }
        return $atribut;
    }



}
