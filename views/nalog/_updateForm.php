<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Korisnik;
use app\models\Os;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Nalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nalog-form" style="margin:60px auto; width:70%;">

    <?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'osID')->label('Osnovno sredstvo')->widget(Select2::classname(), [
			'data' =>ArrayHelper::map(Os::find()->select(['nazivOs', 'osID'])->all(), 'osID', 'nazivOs'),
				'language' => 'en',
				'options' => ['placeholder' => 'Izaberi sredstvo..'],
				'pluginOptions' => [ 'allowClear' => true ],
		]); ?>

		<?= $form->field($model, 'statusNaloga')->dropDownList([ 'Na cekanju' => 'Na cekanju', 'U obradi' => 'U obradi', 'Zavrseno' => 'Zavrseno',]) ?>

		<?= $form->field($model, 'opis')->textarea(['rows' => 3]) ?>

		<div class="form-group" style="margin-top:30px;">
			<?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
		</div>

    <?php ActiveForm::end(); ?>

</div>
