<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AtributiKategorije */

$this->title = Yii::t('app', 'Update Atributi Kategorije: {name}', [
    'name' => $modelAtributiKategorije->atrKatID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atributi Kategorijes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelAtributiKategorije->atrKatID, 'url' => ['view', 'id' => $modelAtributiKategorije->atrKatID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atributi-kategorije-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelAtributiKategorije' => $modelAtributiKategorije,
    ]) ?>

</div>
