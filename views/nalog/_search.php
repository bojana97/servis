<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DateTimePicker;
?>

<div class="nalog-search">

	 <?php $form = ActiveForm::begin([
			'action' => ['index'],
			'method' => 'get',
			'options' => [
				'data-pjax' => 1
			],
	 ]); ?>

	<div class="row" style="margin:20px 0 40px;">
		<div class="col-md-3" >
			<?= $form->field($model, 'nazivOs')->textInput()->label('Osnovno sredstvo')?>
			<?= $form->field($model, 'statusNaloga')->dropDownList([ 'na cekanju' => 'Na cekanju', 'u obradi' => 'U obradi', 'zavrseno' => 'Zavrseno', ], ['prompt' => 'Svi']) ?>
		</div>

		<div class="col-md-3" >
			<?= $form->field($model, 'prijavio')->textInput()->label('Korisnik')?>
			<?= $form->field($model, 'datum')->textInput()->label('Datum')?>

		</div>	

		<div class="col-md-6" style="margin-top:-10px;">
			<?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('app', 'Resetuj'), ['index'], ['class' => 'btn  btn-default']) ?>
		</div>

	</div>
    <?php ActiveForm::end(); ?>

</div>
