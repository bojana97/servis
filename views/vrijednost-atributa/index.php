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

<div class="attribute-values-index" style="margin-top:20px;">

 <!-- sidebar for displaying all existing atributes and their atributtes -->
<div class="sidebar-val-atr" style="width:230px; height:580px; float:left; overflow:scroll;background-color:#f7f7f7; text-align:center; border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-bottom:10px;">
	<?php  foreach($atributiVrijednosti as $atributVrijednost): ?>

		<?php if( !in_array( $atributVrijednost ['nazivAtr'], $niz)): ?>
			<hr>
			<?php $niz[] = $atributVrijednost ['nazivAtr']; ?>
			<h5> <?= $atributVrijednost['nazivAtr']; ?> </h5>	
			<br>
		<?php endif; ?>

		<p style="text-align:left; margin-left:10px; "> 
		<?=  $atributVrijednost['vrijednost']; ?> </p>
	
	<?php endforeach; ?>
</div>


</div>
