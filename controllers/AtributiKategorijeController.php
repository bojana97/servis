<?php

namespace app\controllers;

use Yii;
use app\models\AtributiKategorije;
use app\models\AtributiKategorijePretraga;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * AtributiKategorijeController implements the CRUD actions for AtributiKategorije model.
 */
class AtributiKategorijeController extends Controller
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
					[    // all the actions are accessible only to administrator
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

    /**
     * Lists all AtributiKategorije models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AtributiKategorijePretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AtributiKategorije model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AtributiKategorije model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelAtributiKategorije = new AtributiKategorije();

        if ($modelAtributiKategorije->load(Yii::$app->request->post()) && $modelAtributiKategorije->save()) {
            return $this->redirect(['view', 'id' => $modelAtributiKategorije->atrKatID]);
        }

        return $this->render('create', [
            'modelAtributiKategorije' => $modelAtributiKategorije,
        ]);
    }

    /**
     * Updates an existing AtributiKategorije model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelAtributiKategorije = $this->findModel($id);

        if ($modelAtributiKategorije->load(Yii::$app->request->post()) && $modelAtributiKategorije->save()) {
            return $this->redirect(['view', 'id' => $modelAtributiKategorije->atrKatID]);
        }

        return $this->render('update', [
            'modelAtributiKategorije' => $modelAtributiKategorije,
        ]);
    }

    /**
     * Deletes an existing AtributiKategorije model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AtributiKategorije model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AtributiKategorije the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AtributiKategorije::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
