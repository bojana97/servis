<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = Yii::t('app', 'Unos novog korisnika');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisnici'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korisnik-create">

    <?= $this->render('_form', [
        'model' => $model,
		'authAssignment'=> $authAssignment,
		'role' => $role,
    ]) ?>

</div>
