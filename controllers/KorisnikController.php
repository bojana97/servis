<?php

namespace app\controllers;

use Yii;
use yii\models\Base;
use yii\base\Model;
use app\models\Korisnik;
use app\models\KorisnikPretraga;
use app\models\AuthItem;
use app\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;


class KorisnikController extends Controller
{

    public function behaviors()
    {
        return [

			 'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index','view'],                                   
						'allow' => true,
						'roles' => ['serviser'],
					],
					[   
						'allow' => true,  
						'roles' => [ 'administrator'],
					],   
				],
			 ], 

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new KorisnikPretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionView($id){

		$model = Korisnik::find()->with('naloziPrijavio')->with('sektor')
					->where(['korisnikID'=>$id])
					->asArray()
					->all();

		return $this->render('view', [
			 'model' => $model,
		]);
    }


    public function actionCreate()
    {
        $model = new Korisnik();
		$authAssignment = new AuthAssignment();

		$role = ArrayHelper::map(AuthItem::find()->where( ['type'=>1] )->all(), 'name', 'name');

		if(($model->load(Yii::$app->request->post())) && ($authAssignment->load(Yii::$app->request->post())) ) {
			$model->lozinka = Yii::$app->getSecurity()->generatePasswordHash($model->lozinka);
			$model->save(false);

			$authAssignment->user_id = $model->korisnikID;
			$authAssignment->item_name = $authAssignment->item_name;
			$authAssignment->save(false);

			return $this->redirect(['view', 'id' => $model->korisnikID ]);

		}

        return $this->render('create', [
            'model' => $model,
			'authAssignment'=> $authAssignment,
			'role' => $role,
		
        ]);
    }






    public function actionUpdate($id)
    {
        $role = ArrayHelper::map(AuthItem::find()->where( ['type'=>1] )->all(), 'name', 'name');

		$model = Korisnik::findOne($id);
		if(!$model){ throw new NotFoundHttpException("Korisnik nije pronadjen."); }


		$authAssignment = AuthAssignment::find()->where(['user_id' => $model->korisnikID])->one();
		if(!$authAssignment) { throw new NotFoundHttpException('Korisniku nije dodijeljena rola.'); }

        if ( $model->load(Yii::$app->request->post()) && $authAssignment->load(Yii::$app->request->post()) ) {
           $isValid = $model->validate();
		   $idValid = $authAssignment->validate() && $isValid;

		   if($isValid){
				$model->save(false);
				$authAssignment->save(false);

				return $this->redirect(['view', 'id' => $model->korisnikID]);
		   }
        }

        return $this->render('update', [
            'model' => $model,
			'authAssignment'=> $authAssignment,
			'role' => $role,
		
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Korisnik::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
