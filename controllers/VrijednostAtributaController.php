<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use app\models\VrijednostAtributa;
use app\models\VrijednostAtributaPretraga;
use app\models\Atribut;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * VrijednostAtributaController implements the CRUD actions for VrijednostAtributa model.
 */
class VrijednostAtributaController extends Controller
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
     * Lists all VrijednostAtributa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VrijednostAtributaPretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$atributiVrijednosti = (new yii\db\Query())
							->select('nazivAtr, vrijednost')
							->from('atribut')
							->join('INNER JOIN', 'vrijednost_atributa', 'atribut.atrID=vrijednost_atributa.atrID')
							->orderBy('nazivAtr ASC')
							->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'atributiVrijednosti' => $atributiVrijednosti,
        ]);
    }



    /**
     * Displays a single VrijednostAtributa model.
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
     * Creates a new VrijednostAtributa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
   */
    public function actionCreate()
    {
        $model = new VrijednostAtributa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
		Yii::$app->session->setFlash('succes', 'Vrijednost atributa uspjesno unesena!');
            return $this->redirect(['view', 'id' => $model->vrijAtrID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	
	/*

	public function actionCreate(){

			//Find out how many products have been submitted by the form
			$count = count(Yii::$app->request->post('VrijednostAtributa', []));

			//Send at least one model to the form
			$vrijednosti = [new VrijednostAtributa()];

			//Create an array of the products submitted
			for($i = 1; $i < $count; $i++) {
				$vrijednosti[] = new VrijednostAtributa();
			}

			//Load and validate the multiple models
			if (Model::loadMultiple($vrijednosti, Yii::$app->request->post()) && Model::validateMultiple($vrijednosti)) {

				foreach ($vrijednosti as $vrijednost) {

					//Try to save the models. Validation is not needed as it's already been done.
					$vrijednost->save(false);

				}
				Yii::$app->session->setFlash('succes', 'Vrijednost atributa uspjesno unesena!');
				return $this->redirect('index');
			}

		return $this->render('create', ['vrijednosti' => $vrijednosti]);
		
	}
	*/

    /**
     * Updates an existing VrijednostAtributa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vrijAtrID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
	

    /**
     * Deletes an existing VrijednostAtributa model.
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
     * Finds the VrijednostAtributa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VrijednostAtributa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VrijednostAtributa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }





















}
