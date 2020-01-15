<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="kategorija-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'nazivKat')->textInput(['placeholder'=>'Pretrazi kategoriju..'])->label(false) ?>

    <?php ActiveForm::end(); ?>

</div>
