<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\Atribut;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VrijednostAtributaPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Moguce vrijednosti atributa');
$this->params['breadcrumbs'][] = $this->title;
$niz=[];
?>

<div class="attribute-values-index" style="width:1140px; height:1500px; margin-top:40px;">

 <!-- sidebar for displaying all existing atributes and their atributtes -->
<div class="sidebar-val-atr" style="width:250px; float:left; background-color:#f7f7f7; text-align:center; border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom:10px;">
	<?php  foreach($atributiVrijednosti as $atributVrijednost): ?>

		<?php if( !in_array( $atributVrijednost ['nazivAtr'], $niz)): ?>
			<hr>
			<?php $niz[] = $atributVrijednost ['nazivAtr']; ?>
			<h4> <?= $atributVrijednost['nazivAtr']; ?> </h4>	
			<br>
		<?php endif; ?>

		<p style="text-align:left; margin-left:10px; "> <?=  $atributVrijednost['vrijednost']; ?> </p>
	
	<?php endforeach; ?>
</div>


<!-- form for creating new possible value for specific attribute -->
<div class="create-val" style="width:600px; float:left;background-color:#f7f7f7;padding:15px 40px;margin-left:30px;
					border-radius:3px;box-shadow: 0 2px 6px 0 rgba(32,178,170), 0 6px 10px 0 rgba(0, 0, 0, 0.19); padding-bottom:10px;">

    <?php $form = ActiveForm::begin(); ?>

	<p style="padding-bottom:7px;text-align:right;">- Unesi mogucu vrijednost atributa -</p>


    <?= $form->field($model, 'atrID', ['labelOptions' => ['style'=>'font-weight:400']] ) ->textInput() ->label('Atribut')
			 ->dropDownList(ArrayHelper::map(Atribut::find()->select(['atrID','nazivAtr'])->all(), 'atrID', 'nazivAtr'),
			 ['class'=>'form-control inline-block', 'prompt'=>' '])
	?>

    <?= $form->field($model, 'vrijednost', ['labelOptions' => ['style'=>'font-weight:400']] ) ->textInput(['maxlength' => true])->label('Vrijednost') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Sacuvaj'), ['class' => 'btn btn-success', 'style'=>'background-color:#20B2AA']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>








</div>
