<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Sektor;

?>

<div class="korisnik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

	<div class="row" style="margin:25px 0 20px 0;">

		 <div class="col-md-4">
		     <?= $form->field($model, 'korisnik')->textInput()->label('Korisnik', ['class'=>"label-class"]) ?>

			 <?= $form->field($model, 'sektorID')->textInput()->label('Sektor', ['class'=>"label-class"])
			 ->dropDownList(ArrayHelper::map(Sektor::find()
			 ->select(['naziv', 'sektorID'])->all(), 'sektorID', 'naziv'),
			 ['class'=>'form-control inline-block', 'prompt'=>'Svi'])
		?>
		</div>

	<div class="col-md-2" style="margin-top:25px;">
		<?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
	</div>

	<div class="col-md-6"  >
		   <?= Html::a(Yii::t('app', 'Sektori'), ['sektor/index'], ['class'=>'btn btn-default', 'style'=>'float:right;']); ?>
	   <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>&nbsp;Unos korisnika'), ['create'], ['class' => 'btn btn-success', 'style'=>"float:right;margin-right:10px;"]) ?>
	</div>


 

    <?php ActiveForm::end(); ?>
</div>
</div>
