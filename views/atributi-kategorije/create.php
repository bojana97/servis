<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AtributiKategorije */

/*
$this->title = Yii::t('app', 'Kr');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dodijeli atribut kategoriji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dodijeli atribut kategoriji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
*/

?>
<div class="atributi-kategorije-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelAtributiKategorije' => $modelAtributiKategorije,
    ]) ?>

</div>
