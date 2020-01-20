<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $sredstva[0]->nazivOs;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Osnovna sredstva'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div>
<div class="detailview-container">

	<table class="table table-bordered">
	  <tbody>
		<tr>
		  <th class="bg-success" scope="row">Naziv sredstva</th>
		  <td><?= $sredstva[0]->nazivOs ?></td>
		</tr>
		<tr>
		  <th class="bg-success" scope="row">Inventarni broj</th>
		  <td><?= $sredstva[0]->invBroj ?></td>
		</tr>
		<tr>
		  <th class="bg-success" scope="row">Kategorija</th>
		  <td><?= $sredstva[0]->kat->nazivKat ?></td>
		</tr>

		<?php foreach($sredstva[0]->vrijednostAtributa as $vrijednost): ?>
		<tr>
		  <th class="bg-success" scope="row"><?= $vrijednost->atr->nazivAtr ?></th>
		  <td><?= $vrijednost->vrijednost ?></td>
		</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>

<div class="detailview-buttons">
	
        <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $sredstva[0]->osID], ['class' => 'detailview-update']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' =>  $sredstva[0]->osID], [
            'class' => 'detailview-delete',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
   
</div>

</div>

