<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NalogPretraga */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="nalog-search">

 <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
 ]); ?>

<div class="row" style="margin:30px 0 20px;">
	<div class="col-md-3" style="">
		<?= $form->field($model, 'nalogID')->textInput()->label('Broj naloga')?>
		<?= $form->field($model, 'nazivOs')->textInput()->label('Osnovno sredstvo')?>
	</div>

	<div class="col-md-3" >
		<?= $form->field($model, 'statusNaloga')->dropDownList([ 'na cekanju' => 'Na èekanju', 'u obradi' => 'U obradi', 'završeno' => 'Završeno', ], ['prompt' => '']) ?>
		<?= $form->field($model, 'serviser')->textInput()->label('Serviser')?>
	</div>

	<div class="col-md-3";>
		<?= $form->field($model, 'korisnik')->textInput()->label('Korisnik')?>
		<div class="form-group" style="margin-top:40px;margin-left:50px;">
		<?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Resetuj'), ['index'], ['class' => 'btn  btn-default']) ?>
		</div>
	</div>

	<div class="col-md-3" >
        <?= Html::a(Yii::t('app', 'Unesi novi nalog'), ['create'], ['class' => 'btn btn-success', 'style'=>'margin-top:23px;margin-left:50px;']) ?>
	</div>
</div>
    <?php ActiveForm::end(); ?>
</div>
</div>
