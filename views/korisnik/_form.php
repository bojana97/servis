<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Sektor;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="korisnik-form">
	<div class="row" style="margin:80px 100px 20px; background-color:#f7f7f7;padding:20px;border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

    <?php $form = ActiveForm::begin(); ?>

	<div class="col-md-6">
		<?= $form->field($model, 'ime')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'prezime')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'sektorID')->textInput()->label('Sektor')
			 ->dropDownList(ArrayHelper::map(Sektor::find()
			 ->select(['naziv', 'sektorID'])->all(), 'sektorID', 'naziv'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
		?>
		<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>

	</div>

	<div class="col-md-6">
		<?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'korisnickoIme')->textInput(['maxlength' => true]) ?>
	</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
