<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Serviser */

$this->title = Yii::t('app', 'Izmijeni podatke servisera: '. $model->punoImeServisera, [
    'name' => $model->serviserID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Serviseri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->punoImeServisera, 'url' => ['view', 'id' => $model->serviserID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni podatke');
?>
<div class="serviser-update">

    <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
