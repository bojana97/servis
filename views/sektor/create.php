<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = Yii::t('app', 'Novi sektor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis sektora'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sektor-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
