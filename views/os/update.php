<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Os */

$this->title = Yii::t('app', 'Izmijeni: {name}', [
    'name' => $model->nazivOs,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis osnovnih sredstava'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazivOs, 'url' => ['view', 'id' => $model->osID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni');
?>
<div class="os-update">

    <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
