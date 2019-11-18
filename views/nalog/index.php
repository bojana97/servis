<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NalogPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Nalozi');
?>

	<?= Html::button('Novi nalog', ['value'=>Yii::$app->urlManager->createUrl('/nalog/create'), 
					'class'=>'btn btn-success', 'style'=>'margin:20px 0;float:right;',
					'id'=>'modelButton'])
	?>

<div class="nalog-index" >

	<?php       
	  Modal::begin([
			'header' => '<h4 class="text-center">Kreiraj novi nalog</h4>',
			'id'     => 'model',	
			'size'   => 'modal-lg',
		]); 
		echo "<div id='modelContent' style='margin:50px 70px;color:#707070;'></div>";
	  Modal::end();          
	?>

<p></p>
	<?php  
		//ako ulogovani korisnik ima samo rolu 'korisnik', ne prikazivati polja za pretragu
		if (Yii::$app->user->identity->getRoleName() !== 'korisnik'){
			echo $this->render('_search', ['model' => $searchModel]); 
		}
	?>
	

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
		'layout' => "{summary}{items}<div class='text-center'>{pager}</div>",
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
			'label'=>'Broj naloga',
			'value'=>'nalogID',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px; font-size:13px;', 'class' => 'text-center'],
			],

            [
			'label'=>'Osnovno sredstvo',
			'value'=>'os.invBroj',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Prijavio',
			'value'=>'prijavioNalog.punoImeKorisnika',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Zaprimio nalog',
			'value'=>'zaprimioNalog0.punoImeKorisnika',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			
		  	[
			'label'=>'Datum otvaranja',
			'value'=>'datOtvaranja',
			'format' => ['date', 'php:d-m-Y h:i:s'],
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
     		[
			'label'=>'Datum zatvaranja',
			'value'=>'datZatvaranja',
			'format' => ['date', 'php:d-m-Y h:i:s'],
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Status',
			'value'=>'statusNaloga',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
			[
			'label'=>'Opis',
			'value'=>function($data) { return substr($data->opis, 0, 20);  },
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
            ['class' => 'yii\grid\ActionColumn',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
        ],
	   'tableOptions' => ['class' => 'table table-sm table-stripped table-hover', 'style'=>'border-radius:10px;'],
    ]); ?>


</div>
