<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Izmijeni podatke korisnika: {name}', ['name' => $model->punoImeKorisnika,]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisnici'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->punoImeKorisnika, 'url' => ['view', 'id' => $model->korisnikID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Izmijeni');

?>
<div class="korisnik-update">

    <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
		'role' => $role,
		'authAssignment' => $authAssignment,
    ]) ?>

</div>
