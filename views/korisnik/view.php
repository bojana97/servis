<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = $model->punoImeKorisnika;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisnici'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="korisnik-view" style="margin: 60px 170px;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
			[
			'label'=> 'Ime i prezime',
			'attribute'=> 'punoImeKorisnika'
			],

			[
			'label'=> 'Sektor',
			'attribute'=> 'sektor.naziv'
			],

            'telefon',

            [
			'label'=> 'E-mail',
			'attribute'=> 'email',
			'format'=>'email'
			],
			[
			'label'=> 'Korisnicko ime',
			'attribute'=> 'korisnickoIme'
			],
        ],
    ]) ?>


	<p>
        <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $model->korisnikID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $model->korisnikID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
