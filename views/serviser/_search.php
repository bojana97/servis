<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServiserPretraga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serviser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

  <div class="row" style="margin:30px 0 20px 0;">

	 <div class="col-md-4">
		<?= $form->field($model, 'serviser')->textInput()->label('Serviser') ?>
	 </div>
   
    <div class="col-md-4" style="margin:25px 0;">
        <?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
	</div>

	<div class="col-md-4" >
	   <?= Html::a(Yii::t('app', 'Unos servisera'), ['create'], ['class' => 'btn btn-success', 'style'=>"margin:26px 0 20px 140px;"]) ?>
	</div>
 </div>

    <?php ActiveForm::end(); ?>

</div>
