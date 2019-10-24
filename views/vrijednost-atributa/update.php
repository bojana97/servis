<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VrijednostAtributa */

$this->title = Yii::t('app', 'Update Vrijednost Atributa: {name}', [
    'name' => $model->vrijAtrID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vrijednost Atributas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vrijAtrID, 'url' => ['view', 'id' => $model->vrijAtrID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vrijednost-atributa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
