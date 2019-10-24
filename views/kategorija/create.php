<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kategorija */

//$this->title = Yii::t('app', 'Create Kategorija');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategorijas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategorija-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
