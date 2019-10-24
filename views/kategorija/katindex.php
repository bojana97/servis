<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kategorija;

/*	
	ubaciti poslije u formu
	<?= Html::a(Yii::t('app', 'Nova kategorija'), ['create'], ['class' => 'btn  btn-default']) ?>
	<?= Html::a(Yii::t('app', 'Novi atribut'), ['atribut/create'], ['class' => 'btn  btn-default']) ?>
	<?= Html::a(Yii::t('app', 'Dodijeli atribut kategoriji '), ['atributi-kategorije/create'], ['class' => 'btn  btn-default']) ?>
*/

$this->title = Yii::t('app', 'Podesavanja kategorija');
$this->params['breadcrumbs'][] = $this->title;
$niz=[];

?>

<div class="kategorije-container" style="width:1140px; height: 150px; margin-top:40px;">
<div class="kategorije" style="width:250px; float:left; background-color:#f7f7f7; text-align:center; border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom:10px;">
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

<div class="create-kat" style="width:600px; float:left; background-color:#f7f7f7;padding:20px 40px;margin-left:50px;
					border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom:10px;">

	<?php $form = ActiveForm::begin(); ?>

	<p style="padding-bottom:10px;text-align:right;">- Kreiraj novu kategoriju -</p>

	<?= $form->field($model, 'roditeljID', ['labelOptions'=>['style'=>'font-weight:400']] )->textInput()->label('Nadkategorija')
			 ->dropDownList(ArrayHelper::map(Kategorija::find()
			 ->select(['katID', 'nazivKat'])->all(), 'katID', 'nazivKat'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

    <?= $form->field($model, 'nazivKat', ['labelOptions'=>['style'=>'font-weight:400']] )->textInput(['maxlength' => true])->label('Naziv kategorije') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>






</div>


