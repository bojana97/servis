<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Serviser */

\yii\web\YiiAsset::register($this);

?>
<div class="serviser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->serviserID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->serviserID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
			'label'=> 'ID servisera',
			'attribute'=> 'serviserID'
			],
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

</div>
