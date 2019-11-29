<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Atribut;

/* @var $this yii\web\View */
/* @var $model app\models\VrijednostAtributa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vrijednost-atributa-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
