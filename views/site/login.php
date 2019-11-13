<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div id="login-forma">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'default',
        'fieldConfig' => [
            //'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            //'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]); ?>


	<?= Html::activeLabel($model, 'username', ['class'=>'labels']); ?>
	<?= Html::activeTextInput($model, 'username', ['class'=>'inputs']); ?>
	<?= Html::error($model, 'username'); ?>

	<?= Html::activeLabel($model, 'password', ['class'=>'labels']); ?>
	<?= Html::activePasswordInput($model, 'password', ['class'=>'inputs']); ?>
	<?= Html::error($model, 'password'); ?>
   
    <?= $form->field($model, 'rememberMe')->checkbox([  ]); ?>

    <div class="form-group">
      <?= Html::submitButton('Login', ['class' => 'btn btn-primary login','id'=>'log-btn', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
