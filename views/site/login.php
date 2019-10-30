<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Prijavi se';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style="background-color:#D3D3D3; margin:70px auto;padding:90px 60px;width:600px;">



    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            //'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]); ?>



        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Korisnicko ime') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Lozinka') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([  ]) ?>

        <div class="form-group text-center">
                <?= Html::submitButton('Prijavi se', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>

   <!-- <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div> -->

</div>
