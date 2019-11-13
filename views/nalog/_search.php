<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\NalogPretraga */
/* @var $form yii\widgets\ActiveForm */
/* Html::a(Yii::t('app', 'Unesi novi nalog'), ['create'], ['class' => 'btn btn-success', 'style'=>'margin-top:23px;margin-left:50px;']) 
*/
?>
<div class="nalog-search">

 <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
 ]); ?>


<div class="row" style="margin:20px 0 40px;">
	<div class="col-md-3" >
		<?= $form->field($model, 'nazivOs')->textInput()->label('Osnovno sredstvo')?>
		<?= $form->field($model, 'statusNaloga')->dropDownList([ 'na cekanju' => 'Na cekanju', 'u obradi' => 'U obradi', 'zavrseno' => 'Zavrseno', ], ['prompt' => 'Svi']) ?>

	</div>

	<div class="col-md-3" >
		<?= $form->field($model, 'prijavio')->textInput()->label('Korisnik')?>
		<div class="form-group" style="margin:40px 0 0 40px;">
		<?= Html::submitButton(Yii::t('app', 'Pretrazi'), ['class' => 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Resetuj'), ['index'], ['class' => 'btn  btn-default']) ?>
		</div>
	</div>	
</div>
    <?php ActiveForm::end(); ?>

</div>
