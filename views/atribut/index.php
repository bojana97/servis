<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Ispis atributa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Podesavanja kategorija i sredstava'), 'url' => ['..\kategorija\katindex']];
$this->params['breadcrumbs'][] = $this->title;
?>
				
<?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>&nbsp;Novi atribut'), ['create'], ['class' => 'btn  btn-success', 'style'=>'float:right;margin:0 0 25px;']) ?>

<div class="atribut-index" style="width:800px;margin:40px auto 0px;">

	<?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'layout' => "{items}<div class='text-center'>{pager}</div>",
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
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],		
		],

         
		  [
		   //da bi se prikazalo text input polje "user.username" mijenjamo sa..
		   'attribute'=>'nazivAtr',
		   'header'=> 'Atribut',
		   'value'=>'nazivAtr',
		   'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],

		  ],

     
            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],		
],
        ],
    ]); ?>

</div>
