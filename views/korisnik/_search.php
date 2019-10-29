<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KorisnikPretraga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="korisnik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

	<div class="row" style="margin:30px 0 20px 0;">

		 <div class="col-md-4">
		     <?= $form->field($model, 'korisnik')->textInput()->label('Korisnik') ?>
			 <?= $form->field($model, 'sektor')->textInput()->label('Sektor') ?>
		</div>

	<div class="col-md-2" style="margin-top:25px;">
		<?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
	</div>

	<div class="col-md-6" style="margin-top:25px;" >
	   <?= Html::a(Yii::t('app', 'Unos korisnika'), ['create'], ['class' => 'btn btn-success', 'style'=>"float:right;margin-left:10px;"]) ?>
	   <?= Html::a(Yii::t('app', 'Sektori'), ['/sektor/index'], ['class' => 'btn btn-default', 'style'=>"float:right;"]) ?>
	</div>
 

    <?php ActiveForm::end(); ?>
</div>
</div>
