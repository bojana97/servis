<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atribut */

$this->title = Yii::t('app', 'Izmijeni atribut: {name}', [
    'name' => $modelAtribut->nazivAtr,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispis atributa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni');
?>
<div class="atribut-update" >

    <h4 style="text-align:center;"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'modelAtribut' => $modelAtribut,
		'modelsVrijednostAtributa' => $modelsVrijednostAtributa,
    ]) ?>

</div>
