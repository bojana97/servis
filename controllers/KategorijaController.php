<?php

namespace app\controllers;

use Yii;
use app\models\Kategorija;
use app\models\KategorijaPretraga;
use app\models\Atribut;
use app\models\AtributiKategorije;
use app\models\KategorijaForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * KategorijaController implements the CRUD actions for Kategorija model.
 */
class KategorijaController extends Controller
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
						'actions' => ['index','view', 'create', 'katindex', 'update', 'delete', 'config', 'atributi'],  
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
     * Lists all Kategorija models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KategorijaPretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kategorija model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$KategorijaSaAtributima = Kategorija::find()->with('atributi')
													->where(['katID'=>$id])
													->asArray()
													->all();

		return $this->render('view', 
							['KategorijaSaAtributima'=> $KategorijaSaAtributima]);
    }

    /**
     * Creates a new Kategorija model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
	 */

	public function actionCreate()
    {
        $model = new Kategorija();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Kategorija je kreirana.'));
            return $this->redirect(['create', 'id' => $model->katID]);
        } elseif (!\Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->get());
            $model->atributiIDs = ArrayHelper::map($model->atributi, 'nazivAtr', 'nazivAtr');
        }

        return $this->render('create', ['model' => $model]);
    }





    /**
     * Updates an existing Kategorija model.
	*/

	public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Kategorija je izmijenjena.'));
            return $this->redirect(['update', 'id' => $model->katID]);
        } elseif (!\Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->get());
            $model->atributiIDs = ArrayHelper::map($model->atributi, 'nazivAtr', 'nazivAtr');
        }

        return $this->render('update', ['model' => $model]);
    }



    /**
     * Deletes an existing Kategorija model.
     */
    public function actionDelete($id)
    {
        
		$model = $this->findModel($id);
        $kategorija = $model->nazivKat;

				try {
			$model->delete();
			Yii::$app->session->setFlash('success', 'Record  <strong>"' . $kategorija. '"</strong> deleted successfully.');

		} catch (\yii\db\Exception $e) {
			  if ($e->errorInfo[1] == 1451) {
        throw new \yii\web\HttpException(400, 'Failed to delete the object.');
		} else {
			throw $e;
			}
		}

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kategorija model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kategorija the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kategorija::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

	public function actionKatindex()
	{	//use it to display categories and their attributes in katindex.php view file
		$kategorije=(new \yii\db\Query())
			->select (['nazivKat','nazivAtr'])
			->from ('kategorija')
			->join ('INNER JOIN', 'atributi_kategorije', 'kategorija.katID=atributi_kategorije.katID')
			->join ('INNER JOIN', 'atribut', 'atributi_kategorije.atrID=atribut.atrID')
			->orderBy('nazivKat ASC')
			->all();

		//used for creating new atribute on the same view
		$modelAtribut = new Atribut();
        if ($modelAtribut->load(Yii::$app->request->post()) && $modelAtribut->save()) {
			 Yii::$app->session->setFlash('success', 'Atribut uspjesno sacuvan!');
			 return $this->redirect(['katindex']);
        }

		//used for appending atributte on category on the same view
		$modelAtributiKategorije = new AtributiKategorije();
        if ($modelAtributiKategorije->load(Yii::$app->request->post()) && $modelAtributiKategorije->save()) {
			Yii::$app->session->setFlash('success', 'Atribut uspjesno dodijeljen kategoriji!');
           
		   return $this->redirect(['katindex']);
        }

	
		return $this->render('katindex', ['kategorije'=>$kategorije, 'model'=>$model, 
										  'modelAtribut'=>$modelAtribut, 
										  'modelAtributiKategorije' => $modelAtributiKategorije ]);
	}


	public function actionConfig()
	{	
		$kategorija = new Kategorija();
		return $this->render('config', ['kategorija' => $kategorija]);
	}


	public function actionAtributi($id)
	{
		$atributiKategorije= Kategorija::find()->innerJoinWith('atributi')
									->where(['kategorija.katID'=>$id])
									->asArray()
									->all();
									
		return $this->renderPartial('_atributi', ['atributiKategorije' => $atributiKategorije,]);	
	}



}
