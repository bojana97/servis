<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atribut */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atribut-form">
  <div class="kat" style="width:600px; background-color:#f7f7f7;margin: 30px auto;padding:30px 40px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelAtribut, 'nazivAtr')->textInput(['maxlength' => true])->label('Atribut') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
