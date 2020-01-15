<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Kategorija;
use app\models\Atribut;

/* @var $this yii\web\View */
/* @var $model app\models\Kategorija */
/* @var $form yii\widgets\ActiveForm */
?>

  <div class="kategorija-form">
    
  <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	<div class="col-md-6">
		<?= $form->field($model, 'nazivKat')->textInput(['maxlength' => true])->label('Naziv kategorije') ?>
	
		<?= $form->field($model, 'roditeljID')->label('Nadkategorija')
				 ->dropDownList(ArrayHelper::map(Kategorija::find()
				 ->select(['katID', 'nazivKat'])->all(), 'katID', 'nazivKat'),
				 ['class'=>'form-control inline-block', 'prompt'=>' '])
		?>
	</div>
    </div>

   <hr>

   <?= $form->field($model, 'atributiIDs')->widget(Select2::className(), [
            'model' => $model,
			'name' => 'kv_theme_bootstrap_2',
			'theme' => Select2::THEME_BOOTSTRAP,
			'size' => Select2::MEDIUM,
            'attribute' => 'atributiIDs',
            'data' => ArrayHelper::map(Atribut::find()->all(), 'nazivAtr', 'nazivAtr'),
            'options' => [
                'multiple' => true,
				'placeholder'=>'Izaberi pripadajuce atribute..',
            ],
            'pluginOptions' => [
                'tags' => true,
            ],
    ])?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>

