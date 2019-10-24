<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OsPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Osnovna sredstva i kategorije');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
		'layout'=>"{items}",
		'summary' => "{begin} - {end} of {totalCount} items",
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
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
