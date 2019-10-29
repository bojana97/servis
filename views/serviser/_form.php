<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Serviser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serviser-form">
 <div class="row" style="margin:80px 100px 20px; background-color:#f7f7f7;padding:20px;border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <?php $form = ActiveForm::begin(); ?>

	<div class="col-md-6">
		<?= $form->field($model, 'ime')->textInput() ?>
		<?= $form->field($model, 'prezime')->textInput() ?>
		<?= $form->field($model, 'telefon')->textInput() ?>
	</div>

	<div class="col-md-6">
		<?= $form->field($model, 'email')->textInput() ?>
		<?= $form->field($model, 'korisnickoIme')->textInput() ?>
		<?= $form->field($model, 'lozinka')->textInput() ?>
	</div>
		<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>

 </div>
    <?php ActiveForm::end(); ?>

</div>
