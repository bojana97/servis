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
				 ->select(['nazivKat', 'katID'])->all(), 'katID', 'nazivKat'),
				 ['class'=>'form-control inline-block', 'prompt'=>' '])
			?>

		</div>

		</div>
		<hr>

		<?php foreach($modelsVrijednostOs as $i => $modelVrijednostOs):?>
			
		<?php        $atribut = $atributiKategorije[0]['atributi'][$i]; ?>

 		<?= $form->field($modelVrijednostOs, "[$i]vrijAtrID")->label($atribut['nazivAtr'], ['class' => 'label-class'])
		 		->dropDownList(ArrayHelper::map(VrijednostAtributa::find()
				->select(['vrijednost', 'vrijAtrID'])->where(['atrID' => $atribut['atrID']])->all(), 'vrijAtrID','vrijednost'),
				[  'prompt' => Yii::t('app',' '),])
		?>
		
		<?php  endforeach; ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
		</div>

	  <?php ActiveForm::end(); ?>

</div>
