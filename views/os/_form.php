<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Kategorija;
use app\models\Os;
use app\models\Atribut;
use app\models\VrijednostAtributa;

/* @var $this yii\web\View */
/* @var $model app\models\Os */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="os-form">
 <div style="width:900px;margin:50px auto 20px; background-color:#f7f7f7;padding:20px;
 border-radius:1px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">


 <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	<div class="col-sm-4">
		<?= $form->field($model, 'invBroj')->textInput(['maxlength' => true])->label('Inventarni broj') ?>
	</div>
	<div class="col-sm-4">
		<?= $form->field($model, 'nazivOs')->textInput(['maxlength' => true])->label('Naziv osnovnog sredstva') ?>
	</div>

	<div class="col-sm-4">
		<?= $form->field($model, 'katID')->textInput()->label('Kategorija')
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['nazivKat', 'katID'])->all(), 'katID','nazivKat'),
			 [
				'prompt' => Yii::t('app',' '),
				'onchange'=>'
				$.get( "'.Yii::$app->urlManager->createUrl('atribut/lists?id=').'"+$(this).val(), function( data ) {

					$( "#id" ).html( data );
				})'
			]
	);   
	?>
	</div>
	</div>
	<?php
	

	echo $atributi[0]
			//foreach($atributi as $atribut){
			//echo "<option value='". $atribut->atrID ."'>" .$atribut->nazivAtr ."</option>";

			//echo "<label>" .$atribut->nazivAtr ."</label>";
			//$vrijednosti = VrijednostAtributa::find()->where(['atrID' => $atribut->atrID])->all();
			//echo '<select>';
			//Atribut::getPa($vrijednosti);
			//echo '</select>';
			//echo '<br>';

		//}




	<hr>
	<div id='id'></div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>