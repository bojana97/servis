<?php

namespace app\controllers;

use Yii;
use app\models\Kategorija;
use app\models\KategorijaPretraga;
use app\models\Atribut;
use app\models\AtributiKategorije;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
            return $this->redirect(['view', 'id' => $model->katID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kategorija model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->katID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kategorija model.
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


		//used for creating new category on the same view
	    $model = new Kategorija();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->katID]);
        }

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



}
