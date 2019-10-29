<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Serviser */

$this->title = $model->punoImeServisera;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Serviseri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

?>
<div class="serviser-view" style="margin: 60px 170px;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

			[
			'label'=> 'Ime i prezime',
			'attribute'=> 'punoImeServisera'
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
        <?= Html::a(Yii::t('app', 'Izmijeni'), ['update', 'id' => $model->serviserID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Obrisi'), ['delete', 'id' => $model->serviserID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>
