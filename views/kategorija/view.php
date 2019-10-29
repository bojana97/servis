<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kategorija */

$this->title = $model->nazivKat;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis kategorija'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategorija-view" style="margin: 50px auto;text-align:center;width:600px;height:300px;">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'katID',
			[
			'label'=>'Nadkategorija',
			'attribute'=>'roditelj.nazivKat',	
			'value'=> $model->roditeljID != null ? $model->roditeljID : '-',

			],

			[
			'label'=>'Naziv kategorije',
			'attribute'=>'nazivKat',			
			],
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $model->katID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $model->katID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
