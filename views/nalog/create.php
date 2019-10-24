<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nalog */

//$this->title = Yii::t('app', 'Kreiraj novi nalog');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nalozi'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nalog-create">

    <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
