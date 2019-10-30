<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$niz=[];

/* @var $this yii\web\View */
/* @var $model app\models\Os */

$this->title = $model->nazivOs;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Osnovna sredstva'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="os-view" style="margin: 50px auto;text-align:center;width:600px;height:300px;">

    <h4 style="margin:50px auto;"><?= Html::encode($this->title) ?></h4>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
  
            [
			'label'=>'Inventarni broj',
			'attribute'=>'invBroj',
			],

			[
			'label'=>'Naziv sredstva',
			'attribute'=>'nazivOs',
			],

			[
			'label'=> 'Dio sredstva',
			'attribute'=> 'os.nazivOs',
			'value'=> $model->roditeljID != null ? $model->roditeljID : '-',

			],
            
			[
			'label'=>'Kategorija',
			'attribute'=>'kat.nazivKat',
			],
           
        ],
    ]) ?>

	<p>
        <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $model->osID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $model->osID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


