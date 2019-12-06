<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Os */

$this->title = Yii::t('app', 'Novo sredstvo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis sredstava'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-create">


    <?= $this->render('_form', [
        'model' => $model,
		'modelAtribut'=>$modelAtribut,
		'modelsVrijednost'=>$modelsVrijednost,

    ]) ?>

</div>
