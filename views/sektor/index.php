<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;


$this->title = Yii::t('app', 'Sektor');
$this->params['breadcrumbs'][] = $this->title;

?>

    <?= Html::button('<i class="glyphicon glyphicon-plus"></i> Novi sektor', ['value'=>Yii::$app->urlManager->createUrl('/sektor/create'), 
				'class' => 'btn btn-success', 'style'=>'float:right;margin:0 0 25px;', 'id'=>'modelButton']) ?>

<div class="sektor-index" style="width:800px;margin:80px auto 0px;">
   
   	<?php       
	  Modal::begin([
			'header' => '<h4 class="text-center">Kreiraj novi sektor</h4>',
			'id'     => 'model',	
			'size'   => 'modal-md',
		]); 
		echo "<div id='modelContent' ></div>";
	  Modal::end();          
	?>


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
			'label'=>'Sektori',
			'value'=>'naziv',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],
			],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}','headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:15px', 'class' => 'text-center'],
			],
        ],
    ]); ?>

</div>
