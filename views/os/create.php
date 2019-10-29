<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Os */

$this->title = Yii::t('app', 'Unesi podatke novog osnovnog sredstva');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis osnovnih sredstava'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
