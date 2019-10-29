<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Atribut;
use app\models\Kategorija;

/* @var $this yii\web\View */
/* @var $model app\models\AtributiKategorije */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atributi-kategorije-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($modelAtributiKategorije, 'katID')->textInput()->label('Kategorija')
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['nazivKat', 'katID'])->all(), 'katID', 'nazivKat'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

	<?= $form->field($modelAtributiKategorije, 'atrID')->textInput()->label('Atribut')
			 ->dropDownList(ArrayHelper::map(Atribut::find()
			 ->select(['nazivAtr', 'atrID'])->all(), 'atrID', 'nazivAtr'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
