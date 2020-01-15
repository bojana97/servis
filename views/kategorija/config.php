<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\kategorija;
?>


<div class="kategorija">
 <?php $form = ActiveForm::begin(); ?>

 	<div class="col-sm-3">
		<?= $form->field($kategorija, 'katID')->textInput()->label('Ispisi atribute kategorije')
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['nazivKat', 'katID'])->all(), 'katID','nazivKat'),
			 [
				'prompt' => Yii::t('app','-'),
				'onchange'=>'
				$.get( "'.Yii::$app->urlManager->createUrl('kategorija/atributi?id=').'"+$(this).val(), function( data ) {
				$( "#table" ).html( data );
				})'
			]
	);   
	?>

	<div id="table">

	</div>

 <?php ActiveForm::end(); ?>
</div>