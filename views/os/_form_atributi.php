<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Atribut;
use app\models\VrijednostAtributa;
use app\models\VrijednostOs;

?>


<?php $form = ActiveForm::begin(); ?>

	 <?php foreach($modelsVrijednostOs as $i => $modelVrijednostOs) : ?>

		<?php  $atribut = $atributiKategorije[0]['atributi'][$i]; ?>

 		<?= $form->field($modelVrijednostOs, "[$i]vrijAtrID")->label($atribut['nazivAtr'], ['class' => 'label-class'])
		 		->dropDownList(ArrayHelper::map(VrijednostAtributa::find()
				->select(['vrijednost', 'vrijAtrID'])->where(['atrID' => $atribut['atrID']])->all(), 'vrijAtrID','vrijednost'),
				[  'prompt' => Yii::t('app',' '),])
		?>


	 <?php endforeach; ?>

 <?php $form = ActiveForm::end(); ?>
