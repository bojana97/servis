<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="korisnik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sektorID')->textInput() ?>

    <?= $form->field($model, 'ime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prezime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lozinka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'korisnickoIme')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
