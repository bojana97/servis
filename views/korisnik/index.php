<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Korisnici');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korisnik-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
		'layout' => "{summary}\n{items}\n<div class='text-center'>{pager}</div>",
		'summary' => "Prikaz {begin} - {end} od ukupno {totalCount} rekorda",
		'pager' => ['options' => ['class' => 'pagination pull-center']],
		'rowOptions' => function ($model, $key, $index, $grid) {
                    return [
                        'style' => "cursor: pointer; background-color:#E6E6FA; 
									font-size:13px; text-align:center;
									padding: 3px 2px;"
					];
				},
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],		
			],

			[
			'class'=>'yii\grid\DataColumn',
			'label'=>'Ime i prezime',
			'value'=>'punoImeKorisnika',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
			],


			[
			'label'=>'Sektor',
			'value'=>'sektor.naziv',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

            [
			'label'=>'Telefon',
			'value'=>'telefon',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
			],
            
			[
			'label'=>'E-mail',
			'value'=>'email',
			'format'=>'email',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
            
            ['class' => 'yii\grid\ActionColumn', 
				'visibleButtons' => [
					'update' => Yii::$app->user->can('izmijenaKorisnika'),
					'delete' => Yii::$app->user->can('brisanjeKorisnika')
				],
			  'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
        ],
    ]); ?>

</div>
