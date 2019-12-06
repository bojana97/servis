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

 <div class="row" style="margin:20px 0 20px;">
	<div class="col-md-4">
	  <?= $form->field($model, 'kategorija')->textInput()->label('Kategorija') ?>
	  <?= $form->field($model, 'nazivInvBroj')->textInput()->label('Naziv / inventarni broj sredstva') ?>

	</div>
	
	<div class="col-md-4">
	<div class="form-group" style="margin-top:24px;margin-left:10px;">
        <?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
	</div>
	</div>

	<div class="col-md-4">
	    <?= Html::a(Yii::t('app', 'Novo sredstvo'), ['create'], ['class' => 'btn btn-success', 'style'=>'margin-left:250px;']) ?>
	</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
