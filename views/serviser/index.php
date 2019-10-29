<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiserPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Serviseri');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serviser-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        //'filterModel' => $searchModel,
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
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],		
			],

			[
			'class'=>'yii\grid\DataColumn',
			'label'=>'Ime i prezime',
			'value'=>'punoImeServisera',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
			],

            [
			'label'=>'Telefon',
			'value'=>'telefon',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
            
			[
			'label'=>'E-mail',
			'value'=>'email',
			'format'=>'email',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

            [
			'label'=>'Korisnicko ime',
			'value'=>'korisnickoIme',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
