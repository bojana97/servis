<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = Yii::t('app', 'Update Sektor: {name}', [
    'name' => $model->sektorID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sektors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sektorID, 'url' => ['view', 'id' => $model->sektorID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sektor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
