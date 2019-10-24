<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KorisnikPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Korisniks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korisnik-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Korisnik'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'korisnikID',
            'sektorID',
            'ime',
            'prezime',
            'telefon',
            //'email:email',
            //'lozinka',
            //'korisnickoIme',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
