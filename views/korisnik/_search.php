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

    <?= $form->field($model, 'korisnikID') ?>

    <?= $form->field($model, 'sektorID') ?>

    <?= $form->field($model, 'ime') ?>

    <?= $form->field($model, 'prezime') ?>

    <?= $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'lozinka') ?>

    <?php // echo $form->field($model, 'korisnickoIme') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
