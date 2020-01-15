<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Osnovna sredstva i kategorije');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
		'layout' => "{summary}{items}<div class='text-center'>{pager}</div>",
		'summary' => "Prikaz {begin} - {end} od ukupno {totalCount} rekorda",
		'rowOptions' => function ($model, $key, $index, $grid) {
                    return [
                        'style' => "cursor: pointer; background-color:#E6E6FA; 
									font-size:13px; text-align:center;
									padding: 3px 2px;"
					];
				},
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Inventarni broj',
			'value'=>'invBroj',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],

			],

			[
			'label'=>'Naziv osnovnog sredstva',
			'value'=>'nazivOs',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],

			],

			[
			'label'=>'Kategorija',
			'value'=>'kat.nazivKat',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],

			],

            ['class' => 'yii\grid\ActionColumn',
			  'visibleButtons' => [
					'update' => Yii::$app->user->can('izmjenaSredstva'),
					'delete' => Yii::$app->user->can('brisanjeSredstva')
			  ],

			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
			],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
