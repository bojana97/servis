<?php

namespace app\controllers;

use Yii;
use app\models\Nalog;
use app\models\NalogPretraga;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * NalogController implements the CRUD actions for Nalog model.
 */
class NalogController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
			 'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index','view', 'update', 'create'],                                     
						'allow' => true,
						'roles' => ['serviser'],
					],
					[   
						'allow' => true,  
						'roles' => [ 'administrator'],
					], 
					[   
						'actions' => ['index', 'create', 'update', 'view', 'delete'],                                     
						'allow' => true,  
						'roles' => [ 'korisnik'],
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

    /**
     * Lists all Nalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NalogPretraga();

		if (!Yii::$app->user->can('pregledajNaloge')){
			$searchModel->prijavio = Yii::$app->user->id;
		}

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nalog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

		$model=$this->findModel($id);

	    if (\Yii::$app->user->can('pregledajNalog', ['model' => $model])){
			return $this->render('view', ['model' => $model, ]);
		}else{
			throw new ForbiddenHttpException();
		}
    }

    /**
     * Creates a new Nalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nalog();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nalogID]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){

		$model = $this->findModel($id);
        if (\Yii::$app->user->can('izmjenaNaloga', ['model' => $model])){
		
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->nalogID]);
			}

			return $this->render('update', [
				'model' => $model,
			]);

		}else{
			throw new ForbiddenHttpException('You have no bla bla..');
		}
    }

    /**
     * Deletes an existing Nalog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {     
		$model = $this->findModel($id);
		if (\Yii::$app->user->can('brisanjeNaloga', ['model' => $model]))
		{
			$model->delete();
			return $this->redirect(['index']);

		} else
		{
			throw new ForbiddenHttpException('');
		}
    }

    /**
     * Finds the Nalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nalog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
