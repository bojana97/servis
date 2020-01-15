<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Sektor;

?>


<div class="novi-korisnik-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'ime')->textInput(['maxlength' => true])->label('Ime', ['class'=>'label-class']) ?>
		</div>
		<div class="col-md-6">
			<?= $form->field($model, 'prezime')->textInput(['maxlength' => true])->label('Prezime', ['class'=>'label-class']) ?>
		</div>
	</div>


	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'telefon')->textInput(['maxlength' => true])->label('Telefon', ['class'=>'label-class']) ?>
		</div>

		<div class="col-md-6">
			<?= $form->field($model, 'sektorID')->textInput()->label('Sektor', ['class'=>'label-class'])
				 ->dropDownList(ArrayHelper::map(Sektor::find()
				 ->select(['naziv', 'sektorID'])->all(), 'sektorID', 'naziv'),
				 ['class'=>'form-control inline-block', 'prompt'=>' '])
			?>
		</div>
	</div>
	<hr>


	<div class="row">
		<div class="col-md-4">
			<?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('E-mail', ['class'=>'label-class']) ?>
		</div>

		<div class="col-md-4">
			<?= $form->field($model, 'korisnickoIme')->textInput(['maxlength' => true])->label('Korisnicko ime', ['class'=>'label-class']) ?>
		</div>

		<div class="col-md-4">
			<?= $form->field($model, 'lozinka')->passwordInput(['maxlength' => true])->label('Lozinka', ['class'=>'label-class']) ?>
		</div>
	</div>

	<hr>
	<div class="row" id="radioList-rola" >
		<?= $form->field($authAssignment, 'item_name')->radioList($role)->label('Rola korisnika', ['class'=>'label-class']) ; ?>
	</div>
		
		<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
