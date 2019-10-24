<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Os */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="os-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invBroj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'roditeljID')->textInput() ?>

    <?= $form->field($model, 'katID')->textInput() ?>

    <?= $form->field($model, 'nazivOs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
