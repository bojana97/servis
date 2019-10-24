<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VrijednostOs */

$this->title = Yii::t('app', 'Update Vrijednost Os: {name}', [
    'name' => $model->vrijOsID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vrijednost Os'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vrijOsID, 'url' => ['view', 'id' => $model->vrijOsID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vrijednost-os-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
