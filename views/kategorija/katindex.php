<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kategorija;
use app\models\Atribut;
use app\models\AtributiKategorije;
use app\models\VrijednostAtributa;

$this->title = Yii::t('app', 'Podesavanja kategorija');
$this->params['breadcrumbs'][] = ['label' => 'Osnovna sredstva', 'url' => ['os/index']];
$this->params['breadcrumbs'][] = $this->title;
$niz=[];
?>

<div class="kategorije-container" style="width:1140px; height:1000px; margin-top:40px;">

<!-- sidebar for displaying all existing categories and their atributtes -->
<div class="sidebar-cat-atr" style="width:250px; float:left; background-color:#f7f7f7; text-align:center; 
									border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
									padding-bottom:10px;height:500px;overflow:scroll;">

	<?php  foreach($kategorije as $kategorija): ?>
		<?php if( !in_array( $kategorija ['nazivKat'], $niz)): ?>
			<hr>
			<?php $niz[] = $kategorija ['nazivKat']; ?>
			<h4> <?= $kategorija['nazivKat']; ?> </h4>	
			<br>
		<?php endif; ?>

		<p style="text-align:left; margin-left:10px; "> <?=  $kategorija['nazivAtr']; ?> </p>
	
	<?php endforeach; ?>
</div>





<!-- form for creating new category-->
<div class="create-kat" style="width:600px; float:left;background-color:#f7f7f7;padding:10px 40px;margin-left:30px;
					border-radius:3px;box-shadow: 0 2px 6px 0 rgba(32,178,170), 0 6px 10px 0 rgba(0, 0, 0, 0.19); padding-bottom:10px;">
	<?php $form = ActiveForm::begin(); ?>

		<p style="padding-bottom:7px;text-align:right;">- Kreiraj novu kategoriju -</p>
		<?= $form ->field($model, 'roditeljID', ['labelOptions' => ['style'=>'font-weight:400']] ) 
				  ->textInput() ->label('Nadkategorija')
				  ->dropDownList(ArrayHelper::map(Kategorija::find()
				  ->select(['katID', 'nazivKat']) ->all(), 'katID', 'nazivKat'),
				  ['class'=>'form-control inline-block', 'prompt'=>' '])
		?>

		<?= $form->field($model, 'nazivKat', ['labelOptions'=>['style'=>'font-weight:400']] )->textInput(['maxlength' => true])->label('Kategorija') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success', 'style'=>'background-color:#20B2AA']) ?>
		</div>

    <?php ActiveForm::end(); ?>
</div>







<!-- Buttons for viewing categories, atributes -->
<div class="pregled-buttons" style="width:220px; text-align:center;float:left;height:150px; margin-left:30px;background-color:#f7f7f7;padding:5px 40px 15px 40px;
					           border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);">

	<p style="padding-bottom:7px;text-align:right;">- Pregledaj -</p>

	<?= Html::a(Yii::t('app', 'Kategorije'), ['index'], ['class' => 'btn  btn-default', 'style'=>'margin:10px 0;background-color:#20B2AA;color:white;']) ?>
	<?= Html::a(Yii::t('app', 'Atributi'), ['atribut/index'], ['class' => 'btn  btn-default', 'style'=>'background-color:#4682B4;padding:5px 22px;color:white;']) ?>

</div>






<!-- button for values od attributes -->
<div class="pregled-buttons" style="width:220px; text-align:center;float:left;height:110px; margin:20px 0 0 30px;background-color:#f7f7f7;padding:5px 40px 15px 40px;
					           border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);">

	<p style="padding-bottom:7px;text-align:right;">- Konfigurisi -</p>
	<?= Html::a(Yii::t('app', 'Vrijednosti'), ['vrijednost-atributa/index'], ['class' => 'btn  btn-default', 'style'=>'margin:10px 0;background-color:#20B2AA;color:white;']) ?>
</div>









<!-- form for creating new atribut-->
<div class="create-atr" style="width:600px; float:left; height:175px; background-color:#f7f7f7;padding:5px 40px 15px 40px;margin:-10px 10px 10px 30px;
				            	border-radius:3px;box-shadow: 0 4px 8px 0 rgba(70,130,180), 0 6px 10px 0 rgba(0, 0, 0, 0.19); padding-bottom:5px;">

    <?php $form = ActiveForm::begin(); ?>

		<p style="padding-bottom:5px;text-align:right;">- Kreiraj novi atribut -</p>
		<?= $form ->field ($modelAtribut, 'nazivAtr', ['labelOptions' => ['style' => 'font-weight:400']] )
				  ->textInput (['maxlength' => true]) ->label('Atribut') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success', 'style'=>'margin:10px 0;background-color:#4682B4;color:white;']) ?>
		</div>

    <?php ActiveForm::end(); ?>
</div>







<!-- form used to assign attributes to a category -->
<div class="assign-cat-atr" style="width:600px; float:left; height:240px; background-color:#f7f7f7;padding:5px 40px 15px 40px;margin:5px 10px 10px 30px;
					           border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  
  <?php $form = ActiveForm::begin(); ?>
  <p style="padding-bottom:5px;text-align:right;">- Dodijeli atribut kategoriji -</p>


	<?= $form->field($modelAtributiKategorije, 'katID', ['labelOptions' => ['style' => 'font-weight:400']] )
			 ->textInput()->label('Kategorija')
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['nazivKat', 'katID'])->all(), 'katID', 'nazivKat'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

	<?= $form->field($modelAtributiKategorije, 'atrID', ['labelOptions' => ['style' => 'font-weight:400']] )
	         ->textInput()->label('Atribut')
			 ->dropDownList(ArrayHelper::map(Atribut::find()
			 ->select(['nazivAtr', 'atrID'])->all(), 'atrID', 'nazivAtr'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>




</div>


