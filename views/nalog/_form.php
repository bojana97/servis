<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Korisnik;
use app\models\Serviser;
use app\models\Os;

/* @var $this yii\web\View */
/* @var $model app\models\Nalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nalog-form">
 <div class="row" style="margin:70px 50px 20px; background-color:#f7f7f7;padding:20px;border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

   	<?= $form->field($model, 'osID')->textInput()->label('Osnovno sredstvo')
			 ->dropDownList(ArrayHelper::map(Os::find()
			 ->select(['nazivOs', 'osID'])->all(), 'osID', 'nazivOs'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

	<?= $form->field($model, 'korisnikID')
			 ->dropDownList(ArrayHelper::map(Korisnik::find()
			 ->select(['ime', 'prezime', 'korisnikID'])->all(), 'korisnikID','punoImeKorisnika'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])   
	?>


	<?= $form->field($model, 'zaprimioNalog')
			 ->dropDownList(ArrayHelper::map(Serviser::find()
			 ->select(['ime','prezime', 'serviserID'])->all(), 'serviserID', 'punoImeServisera'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>



	<?= $form->field($model, 'izvrsavaNalog')
			 ->dropDownList(ArrayHelper::map(Serviser::find()
			 ->select(['ime','prezime', 'serviserID'])->all(), 'serviserID', 'punoImeServisera'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>
	<div class="form-group" style="margin-top:30px;">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
		<?= Html::a(Yii::t('app', 'Otkazi'), ['create'], ['class' => 'btn  btn-default']) ?>
    </div>

  </div>
	<div class="col-md-6">
      <?= $form->field($model, 'datOtvaranja')->textInput() ?>
      <?= $form->field($model, 'datZatvaranja')->textInput() ?>
      <?= $form->field($model, 'statusNaloga')->dropDownList([ 'Na čekanju' => 'Na čekanju', 'U obradi' => 'U obradi', 'Završeno' => 'Završeno', ], ['prompt' => '']) ?>
	  <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>
	</div>
 </div>

    <?php ActiveForm::end(); ?>

</div>
