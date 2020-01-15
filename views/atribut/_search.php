<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="atribut-search" >

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options' => [
				'data-pjax' => 1
				],
	]); ?>


	<?= $form->field($model, 'nazivAtr')->textInput(['placeholder' => "Pretrazi atribut..."])->label(false) ?> 
		
	<?php ActiveForm::end(); ?>
	
</div>

