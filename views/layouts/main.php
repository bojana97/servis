<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?=  Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
			  [
			  'label' => 'Nalozi',
			  'url' => ['/nalog/index'],
			  ],

			  [
			  'label' => 'Sredstva', 
			  'url' => ['/os/index'],
			  'visible'=>Yii::$app->user->can('pregledajSredstva'),
			  ],

			  [
			  'label' => 'Korisnici',
			  'url' => ['/korisnik/index'],
			  'visible'=>Yii::$app->user->can('pregledajKorisnike'),
			  ],

            Yii::$app->user->isGuest ? (['label' => 'Prijavi se', 'url' => ['/site/login']]) : 
			(
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Odjavi se (' . Yii::$app->user->identity->ime .' '.  Yii::$app->user->identity->prezime .')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                .'</li>'
            )
        ],
    ]);

    NavBar::end();
    ?>
	

    <div class="container">
        <?= Breadcrumbs::widget([
		    'homeLink' => ['label' => 'Nalozi',
			'url' => Yii::$app->getHomeUrl() . 'index.php?r=nalog/index'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Bojana Barisic </p>

        <p class="pull-right"></p>
    </div>
</footer>
-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
