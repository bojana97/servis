<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OsPretraga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="os-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

 <div class="row" style="margin:30px 0 20px;">
	<div class="col-md-4">
	  <?= $form->field($model, 'kategorija')->textInput()->label('Kategorija') ?>
	  <?= $form->field($model, 'nazivInvBroj')->textInput()->label('Naziv / inventarni broj sredstva') ?>

	</div>
	
	<div class="col-md-4">
	<div class="form-group" style="margin-top:24px;margin-left:25px;">
        <?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Resetuj'),['index'], ['class' => 'btn btn-default']) ?>
	</div>
	</div>

	<div class="col-md-4">
	    <?= Html::a(Yii::t('app', 'Unesi novo sredstvo'), ['create'], ['class' => 'btn btn-success', 'style'=>'margin-top:24px;margin-left:100px;']) ?>
		<?= Html::a(Yii::t('app', 'Podesavanja'), ['kategorija/katindex'], ['class' => 'btn btn-default', 'style'=>'margin-top:24px;margin-left:100px;']) ?>
	</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
