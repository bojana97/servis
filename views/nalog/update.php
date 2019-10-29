<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nalog */

$this->title = Yii::t('app', 'Izmijeni podatke naloga: {name}', [
    'name' => $model->nalogID, ]);
$this->params['breadcrumbs'][] = ['label' => 'Nalog broj '.$model->nalogID, 'url' => ['view', 'id' => $model->nalogID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni');
?>
<div class="nalog-update">

    <h4 class='text-center'><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
