<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VrijednostOs */

$this->title = Yii::t('app', 'Create Vrijednost Os');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vrijednost Os'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrijednost-os-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
