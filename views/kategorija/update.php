<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kategorija */

$this->title = Yii::t('app', 'Izmijeni kategoriju: {name}', [
    'name' => $model->nazivKat,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis kategorija'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazivKat, 'url' => ['view', 'id' => $model->katID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni');
?>
<div class="kategorija-update" style="margin-top:70px;">

    <h4 style="text-align:center;"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
