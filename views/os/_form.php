<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Kategorija;
use app\models\Os;
use app\models\Atribut;
use app\models\VrijednostAtributa;


?>

<div class="novo-sredstvo-form">
 <div >

 <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	<div class="col-sm-4">
		<?= $form->field($modelOs, 'invBroj')->textInput(['maxlength' => true])->label('Inventarni broj', ['class'=>'label-class']) ?>
	</div>
	<div class="col-sm-4">
		<?= $form->field($modelOs, 'nazivOs')->textInput(['maxlength' => true])->label('Naziv osnovnog sredstva', ['class'=>'label-class']) ?>
	</div>

	<div class="col-sm-4">
		<?= $form->field($modelOs, 'katID')->textInput()->label('Kategorija', ['class'=>'label-class'])
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['nazivKat', 'katID'])->all(), 'katID','nazivKat'),
			 [
				'prompt' => Yii::t('app',' '),
				'onchange'=>'
				$.get( "'.Yii::$app->urlManager->createUrl('os/list?id=').'"+$(this).val(), function( data ) {
				$( "#table" ).html( data );
				})'
			]
	);   
	?>
	</div>
	</div>
	<hr>
	

	<div id="table">
	<!-- forma sa atibutima selektovane kategorije i njihove vrijednosti  -->
	</div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
