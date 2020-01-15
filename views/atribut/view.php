<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model[0]->nazivAtr;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atributi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="atribut-detailview" >
	<table class="table table-bordered">
	  <tbody>
		<tr>
		  <td class="bg-success"><b><?= $model[0]->nazivAtr ?></b></td>
		</tr>

		<?php foreach($model[0]->vrijednostAtributas as $vrijednost): ?>
			<tr>
			  <td><?= $vrijednost->vrijednost ?></td>
			</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>

<div class="detailview-buttons">
     <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $model[0]->atrID], ['class' => 'detailview-update']) ?>
     <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' =>  $model[0]->atrID], [
         'class' => 'detailview-delete',
         'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
		 ],
     ]) ?> 
</div>
