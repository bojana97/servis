<?php
/*
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Atribut;
use app\models\VrijednostAtributa;
use app\models\VrijednostOs;


$modelVrijednost=[new VrijednostAtr
?>

 <?php $form = ActiveForm::begin(); ?>
<?php foreach ($atributi as $i => $atribut) : ?> 
	

	<?= $form->field($modelVrijednost, "[$i]vrijAtrID")->textInput()->label($atribut->nazivAtr)
		 	->dropDownList(ArrayHelper::map(VrijednostAtributa::find()
			->select(['vrijednost', 'vrijAtrID'])->where(['atrID'=>$atribut->atrID])->all(), 'vrijAtrID','vrijednost'),
			[  'prompt' => Yii::t('app','Vrijednost'),]
		); 
	?>

<?php endforeach; ?>
 <?php $form = ActiveForm::end(); ?>

 */