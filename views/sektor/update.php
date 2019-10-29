<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = Yii::t('app', 'Izmijeni sektor: {name}', [
    'name' => $model->naziv,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis sektora'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni');
?>
<div class="sektor-update">

    <h4 style="text-align:center;"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
