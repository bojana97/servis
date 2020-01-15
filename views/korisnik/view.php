<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$korisnik = $model[0];
$punoIme = $korisnik['ime'].' ' .$korisnik['prezime'];

$this->title = $punoIme;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisnici'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detailview-container" style="margin-top:50px;">

	<table class="table table-bordered">
	  <tbody>
		<tr>
		  <th class="bg-success" scope="row">Ime i prezime</th>
		  <td><?= $punoIme ?></td>
		</tr>
		<tr>
		  <th class="bg-success" scope="row">Sektor</th>
		  <td><?= $korisnik['sektor']['naziv'] ?></td>
		</tr>
		<tr>
		  <th class="bg-success" scope="row">Telefon</th>
		  <td><?= $korisnik['telefon']  ?></td>
		</tr>
		<tr>
		  <th class="bg-success" scope="row">Korisnicko ime</th>
		  <td><?= $korisnik['korisnickoIme'] ?></td>
		</tr>
		<tr>
		  <th class="bg-success" scope="row">E-mail</th>
		  <td><?= $korisnik['email']  ?></td>
		</tr>

		<?php foreach($korisnik['naloziPrijavio'] as $nalog): ?>
		<tr>
		  <th class="bg-success" scope="row"> Nalog <?= $nalog['nalogID'] ?>   </th>
		  <td><?= $nalog['datOtvaranja'] ?>  <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-eye-open"></i>'), ['nalog/view?id='.$nalog['nalogID']], ['style'=>'float:right;']) ?></td>
		</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>

<div class="detailview-buttons">
	
  <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $korisnik['korisnikID']], ['class' => 'detailview-update']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $korisnik['korisnikID']], [
            'class' => 'detailview-delete',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
   
</div>


</div>
