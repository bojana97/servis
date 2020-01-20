<?php

namespace app\models;
use cornernote\linkall\LinkAllBehavior;
use Yii;

/**
 * This is the model class for table "kategorija".
 *
 * @property int $katID
 * @property int $roditeljID
 * @property string $nazivKat
 *
 * @property AtributiKategorije[] $atributiKategorijes
 * @property Kategorija $roditelj
 * @property Kategorija[] $kategorijas
 * @property Os[] $os
 */
class Kategorija extends \yii\db\ActiveRecord
{
 
    public static function tableName()
    {
        return 'kategorija';
    }


	public $atributiIDs;

    public function rules()
    {
        return [
			[['nazivKat', 'atributiIDs'], 'required'],
            [['roditeljID'], 'integer'],
            [['nazivKat'], 'string', 'max' => 30],
            [['roditeljID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategorija::className(), 'targetAttribute' => ['roditeljID' => 'katID']],
        ];
    }

 
    public function attributeLabels()
    {
        return [
            'katID' => Yii::t('app', 'Kat ID'),
            'roditeljID' => Yii::t('app', 'Roditelj ID'),
            'nazivKat' => Yii::t('app', 'Naziv Kat'),
			'atributiIDs'=>Yii::t('app', 'Atributi kategorije'),
        ];
    }

 
    public function behaviors()
    {
        return [
            LinkAllBehavior::className(),
        ];
    }

	 public function afterSave($insert, $changedAttributes)
    {
        $atributi = [];
        foreach ($this->atributiIDs as $nazivAtributa) {
            $atribut = Atribut::getAtributByName($nazivAtributa);
            if ($atribut) {
                $atributi[] = $atribut;
            }
        }
        $this->linkAll('atributi', $atributi);
        parent::afterSave($insert, $changedAttributes);
    }

    public function getAtributi()
    {
        return $this->hasMany(Atribut::className(), ['atrID' => 'atrID'])
            ->viaTable('atributi_kategorije', ['katID' => 'katID']);
    }


    public function getRoditelj()
    {
        return $this->hasOne(Kategorija::className(), ['katID' => 'roditeljID']);
    }

 
    public function getKategorijas()
    {
        return $this->hasMany(Kategorija::className(), ['roditeljID' => 'katID']);
    }


    public function getOs()
    {
        return $this->hasMany(Os::className(), ['katID' => 'katID']);
    }

}
