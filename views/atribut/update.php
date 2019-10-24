<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atribut */

$this->title = Yii::t('app', 'Update Atribut: {name}', [
    'name' => $model->atrID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atributs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->atrID, 'url' => ['view', 'id' => $model->atrID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atribut-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
