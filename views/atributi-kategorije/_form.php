<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtributiKategorije */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atributi-kategorije-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'atrID')->textInput() ?>

    <?= $form->field($model, 'katID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
