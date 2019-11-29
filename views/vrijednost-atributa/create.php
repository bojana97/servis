<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VrijednostAtributa */

$this->title = Yii::t('app', 'Create Vrijednost Atributa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vrijednost Atributas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrijednost-atributa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'vrijednosti' => $vrijednosti,
    ]) ?>

</div>
