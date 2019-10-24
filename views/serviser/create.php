<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Serviser */

$this->title = Yii::t('app', 'Unos podataka novog servisera');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Serviseri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serviser-create">

    <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
