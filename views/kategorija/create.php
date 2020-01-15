<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\kategorija;

/* @var $this yii\web\View */
/* @var $model app\models\Kategorija */

$this->title = Yii::t('app', 'Nova kategorija');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategorije'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="kategorija-create">

<div class="kategorija">
 <?php $form = ActiveForm::begin(); ?>

 	<div class="col-sm-4" style="float:right;">
		<?= $form->field($model, 'katID')->textInput()->label('Ispisi atribute kategorije')
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



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
