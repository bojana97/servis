<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atribut */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atribut-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazivAtr')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
