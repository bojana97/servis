<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use app\models\Korisnik;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NalogPretraga */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Nalozi');
?>
<div class="nalog-index">

    <?php Pjax::begin(); ?>

	<div>
	 <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
	<div>

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
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:15px', 'class' => 'text-center'],		
			],
           
            [
			'class'=>'yii\grid\DataColumn',
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
			'value'=>'korisnik.punoImeKorisnika',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Zaprimio nalog',
			'value'=>'zaprimioNalog0.punoImeServisera',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Izvrsava nalog',
			'value'=>'izvrsavaNalog0.punoImeServisera',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
          
		  	[
			'label'=>'Datum otvaranja',
			'value'=>'datOtvaranja',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
     		[
			'label'=>'Datum zatvaranja',
			'value'=>'datZatvaranja',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],

			[
			'label'=>'Status',
			'value'=>'statusNaloga',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
			[
			'label'=>'Opis',
			'value'=>'opis',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
            ['class' => 'yii\grid\ActionColumn',
			'headerOptions' => ['style' => 'background-color:#0275d8; color:white; padding:10px;font-size:13px;', 'class' => 'text-center'],
			],
        ],
	   'tableOptions' => ['class' => 'table table-sm table-stripped table-hover', 'style'=>'border-radius:10px;'],
    ]); ?>

    <?php Pjax::end(); ?>

</div>