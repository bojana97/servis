<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Kategorija;
use app\models\Os;

/* @var $this yii\web\View */
/* @var $model app\models\Os */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="os-form">
 <div style="width:600px;margin:50px auto 20px; background-color:#f7f7f7;padding:20px;border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">


    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'katID')->textInput()->label('Kategorija')
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['nazivKat', 'katID'])->all(), 'katID','nazivKat'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])   
	?>

	
	<?= $form->field($model, 'roditeljID')->textInput()->label('Roditelj')
			 ->dropDownList(ArrayHelper::map(Os::find()
			 ->select(['nazivOs', 'roditeljID'])->all(), 'roditeljID','nazivOs'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])   
	?>

	<?= $form->field($model, 'invBroj')->textInput(['maxlength' => true])->label('Inventarni broj') ?>

    <?= $form->field($model, 'nazivOs')->textInput(['maxlength' => true])->label('Naziv osnovnog sredstva') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 </div>
</div>
