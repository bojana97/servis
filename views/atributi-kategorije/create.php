<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AtributiKategorije */

$this->title = Yii::t('app', 'Create Atributi Kategorije');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atributi Kategorijes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atributi-kategorije-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
