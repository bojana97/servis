<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = Yii::t('app', 'Create Sektor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sektors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sektor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
