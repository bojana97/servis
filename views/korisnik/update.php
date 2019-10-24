<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = Yii::t('app', 'Update Korisnik: {name}', [
    'name' => $model->korisnikID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisniks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->korisnikID, 'url' => ['view', 'id' => $model->korisnikID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="korisnik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
