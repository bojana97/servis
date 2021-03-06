<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


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
			<?= $form->field($model, 'nazivOs')->textInput()->label('Osnovno sredstvo', ['class'=>"label-class"])?>
			<?= $form->field($model, 'statusNaloga')->dropDownList([ 'na cekanju' => 'Na cekanju', 'u obradi' => 'U obradi', 'zavrseno' => 'Zavrseno', ], ['prompt' => 'Svi'])->label('Status naloga', ['class'=>"label-class"])?>
		</div>

		<div class="col-md-3" >
			<?= $form->field($model, 'prijavio')->textInput()->label('Korisnik', ['class'=>"label-class"]) ?>

			<?= $form->field($model, 'datum')->widget(
				DatePicker::className(), [
						 'inline' => false, 
						 'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd'
						]
				])->label('Datum', ['class'=>"label-class"]);?>


		</div>	

		<div class="col-md-6" style="margin-top:-10px;">
			<?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('app', 'Resetuj'), ['index'], ['class' => 'btn  btn-default']) ?>
		</div>

	</div>
    <?php ActiveForm::end(); ?>

</div>
