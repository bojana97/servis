<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sektor-form">
  <div class="kat" style="width:400px;margin: 30px auto;padding:30px 40px;">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naziv')->textInput(['maxlength' => true])->label('Naziv sektora') ?>

    <div class="form-group ">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
