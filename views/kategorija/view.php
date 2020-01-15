<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$kategorija=$KategorijaSaAtributima[0];
$atributi=$KategorijaSaAtributima[0]['atributi'];

$this->title = $kategorija['nazivKat'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategorije'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="kategorija-detailview" >
	<table class="table table-bordered">
	  <tbody>
		<tr>
		  <td class="bg-success"><b><?= $kategorija['nazivKat'] ?></b></td>
		</tr>

		<?php foreach($atributi as $atribut): ?>
			<tr>
			  <td><?= $atribut['nazivAtr'] ?></td>
			</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>

<div class="detailview-buttons">
    <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $kategorija['katID']], ['class' => 'detailview-update']) ?>
    <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $kategorija['katID']], [
          'class' => 'detailview-delete',
          'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
          ],
    ]) ?>
</div>
