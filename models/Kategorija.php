<?php

namespace app\models;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategorija';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roditeljID'], 'integer'],
            [['nazivKat'], 'string', 'max' => 30],
            [['roditeljID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategorija::className(), 'targetAttribute' => ['roditeljID' => 'katID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'katID' => Yii::t('app', 'Kat ID'),
            'roditeljID' => Yii::t('app', 'Roditelj ID'),
            'nazivKat' => Yii::t('app', 'Naziv Kat'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtributiKategorijes()
    {
        return $this->hasMany(AtributiKategorije::className(), ['katID' => 'katID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoditelj()
    {
        return $this->hasOne(Kategorija::className(), ['katID' => 'roditeljID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategorijas()
    {
        return $this->hasMany(Kategorija::className(), ['roditeljID' => 'katID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOs()
    {
        return $this->hasMany(Os::className(), ['katID' => 'katID']);
    }
}
