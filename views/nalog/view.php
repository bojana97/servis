<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nalog */

$this->title = 'Nalog broj ' . $model->nalogID;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nalozi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nalog-view" style="margin: 40px 150px;">
<div class="">
   

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
			[
			'label'=> 'Broj naloga',
			'attribute'=> 'nalogID'
			],
			[
			'label'=> 'Kategorija',
			'attribute'=> 'os.kat.nazivKat'
			],
			[
			'label'=> 'Osnovno sredstvo',
			'attribute'=> 'os.nazivOs'
			],
			[
			'label'=> 'Inv. broj',
			'attribute'=> 'os.invBroj'
			],

            [
			'label'=> 'Prijavio korisnik',
			'attribute'=> 'prijavioNalog.punoImeKorisnika'
			],
            [
			'label'=> 'Zaprimio nalog',
			'attribute'=> 'zaprimioNalog0.punoImeKorisnika'
			],

           [
			'label'=> 'Vrijeme otvaranja',
			'attribute'=> 'datOtvaranja'
			],
           [
			'label'=> 'Vrijeme zatvaranja',
			'attribute'=> 'datZatvaranja',
			'value'=> $model->datZatvaranja != null ? $model->datZatvaranja : '',
			],
            'opis',
            'statusNaloga',
           ],
		], $options = ['class' => 'table  detail-view']) ?>

	
		<p>
        <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $model->nalogID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $model->nalogID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ]
        ]) ?>
    </p>


</div>
</div>
