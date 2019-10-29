<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AtributPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ispis atributa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Podesavanja kategorija i sredstava'), 'url' => ['..\kategorija\katindex']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribut-index">

    <h5 style="text-align:right;margin:20px 0 50px;"><?= Html::encode($this->title) ?></h5>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
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
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center']],

			[
			'label'=>'Atribut',
			'value'=>'nazivAtr',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],
			],


            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'
             ,'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center']],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
