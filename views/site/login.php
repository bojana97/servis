<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Prijavi se';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style=" background-color:#f7f7f7; margin:70px auto;padding:90px 0 40px;width:600px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">



    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            //'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            //'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]); ?>

	<div style="text-align:center;">
	<?= Html::activeLabel($model, 'username'); ?>
	<p><?= Html::activeTextInput($model, 'username'); ?></p>
	<?= Html::error($model, 'username'); ?>

	<?= Html::activeLabel($model, 'password'); ?>
	<p><?= Html::activePasswordInput($model, 'password'); ?></p>
	<?= Html::error($model, 'password'); ?>
   
        <?= $form->field($model, 'rememberMe')->checkbox([  ]) ?>

        <div class="form-group text-center">
                <?= Html::submitButton('Prijavi se', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
	</div>

    <?php ActiveForm::end(); ?>

   <!-- <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div> -->

</div>
