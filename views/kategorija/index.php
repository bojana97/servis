<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Ispis kategorija ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Podesavanja kategorija i sredstava'), 'url' => ['katindex']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>&nbsp;Nova kategorija'), ['create'], ['class' => 'btn  btn-success', 'style'=>'float:right;margin:0 0 25px;']) ?>
<?= Html::a(Yii::t('app', 'Atributi'), ['atribut/index'], ['class' => 'btn  btn-default', 'style'=>'float:right;margin:0 10px 25px;']) ?>

<div class="kategorija-index" style="width:750px;margin:40px auto 0px;">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'layout' => "{items}<div class='text-center'>{pager}</div>",
		'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
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
		   'attribute'=>'nazivKat',
		   'header'=> 'Kategorija',
		   'value'=>'nazivKat',
		   'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],

		  ],

		  [
		   'attribute'=>'roditelj.nazivKat',
		   'header'=> 'Nadkategorija',
		   'value'=>'roditelj.nazivKat',
		   'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],

		  ],
     
            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],		
],
        ],
    ]); ?>

</div>
