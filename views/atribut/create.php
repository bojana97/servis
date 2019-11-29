<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atribut */

$this->title = Yii::t('app', 'Kreiraj atribut');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atributi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribut-create">

    <?= $this->render('_form', [
        'modelAtribut' => $modelAtribut,
		'modelsVrijednostAtributa'=> $modelsVrijednostAtributa,

    ]) ?>

</div>
