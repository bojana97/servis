<?php

namespace app\controllers;

use Yii;
use app\base\Model;
use app\models\Atribut;
use app\models\AtributPretraga;
use app\models\VrijednostAtributa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * AtributController implements the CRUD actions for Atribut model.
 */
class AtributController extends Controller
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
     * Lists all Atribut models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AtributPretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Atribut model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

		$model = Atribut::find()->with('vrijednostAtributas')->where(['atrID'=>$id])->all();

        return $this->render('view', [
            'model' => $model,
		
        ]);
    }

    /**
     * Creates a new Atribut model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
   
    public function actionCreate()
    {
        $modelAtribut = new Atribut();

        if ($modelAtribut->load(Yii::$app->request->post()) && $modelAtribut->save()) {
            return $this->redirect(['view', 'id' => $modelAtribut->atrID]);
        }

        return $this->render('create', [
            'modelAtribut' => $modelAtribut,
        ]);
    }
	*/

    /**
     * Updates an existing Atribut model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     
    public function actionUpdate($id)
    {
        $modelAtribut = $this->findModel($id);

        if ($modelAtribut->load(Yii::$app->request->post()) && $modelAtribut->save()) {
            return $this->redirect(['view', 'id' => $modelAtribut->atrID]);
        }

        return $this->render('update', [
            'modelAtribut' => $modelAtribut,
        ]);
    }
	*/

    /**
     * Deletes an existing Atribut model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	*/

    /**
     * Finds the Atribut model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Atribut the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){
        if (($model = Atribut::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


	public function actionCreate(){

        $modelAtribut = new Atribut();
        $modelsVrijednostAtributa = [new VrijednostAtributa];

	
        if ($modelAtribut->load(Yii::$app->request->post())) {

            $modelsVrijednostAtributa = Model::createMultiple(VrijednostAtributa::classname());
            Model::loadMultiple($modelsVrijednostAtributa, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsVrijednostAtributa),
                    ActiveForm::validate($modelAtribut)
                );
            }
			

            // validate all models
            $valid = $modelAtribut->validate();
            $valid = Model::validateMultiple($modelsVrijednostAtributa) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $modelAtribut->save(false)) {
                        foreach ($modelsVrijednostAtributa as $modelVrijednostAtributa) {
                            $modelVrijednostAtributa->atrID = $modelAtribut->atrID;
                            if (! ($flag = $modelVrijednostAtributa->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelAtribut->atrID]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

       return $this->render('create', [
            'modelAtribut' => $modelAtribut,
            'modelsVrijednostAtributa' => (empty($modelsVrijednostAtributa)) ? [new VrijednostAtributa] : $modelsVrijednostAtributa,
       ]);	
    }


  





    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

	 
    public function actionUpdate($id)
    {
        $modelAtribut = $this->findModel($id);
        $modelsVrijednostAtributa = $modelAtribut->vrijednostAtributas;
		//ECHO '<pre>';
		//PRINT_R($modelsVrijednostAtributa);
		//echo '</pre>';

        if ($modelAtribut->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsVrijednostAtributa, 'vrijAtrID', 'vrijAtrID');
            $modelsVrijednostAtributa = Model::createMultiple(VrijednostAtributa::classname(), $modelsVrijednostAtributa);
            Model::loadMultiple($modelsVrijednostAtributa, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsVrijednostAtributa, 'vrijAtrID', 'vrijAtrID')));

            // validate all models
            $valid = $modelAtribut->validate();
            $valid = Model::validateMultiple($modelsVrijednostAtributa) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelAtribut->save(false)) {
                        if (!empty($deletedIDs)) {

							try{
							    VrijednostAtributa::deleteAll(['vrijAtrID' => $deletedIDs]);
							} catch (\yii\db\Exception $e) {
								throw new \yii\web\HttpException(400, 'Failed to delete the object.');
							 }

                        }
                        foreach ($modelsVrijednostAtributa as $modelVrijednostAtributa) {
                            $modelVrijednostAtributa->atrID = $modelAtribut->atrID;
                            if (! ($flag = $modelVrijednostAtributa->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelAtribut->atrID]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelAtribut' => $modelAtribut,
            'modelsVrijednostAtributa' => (empty($modelsVrijednostAtributa)) ? [new VrijednostAtributa()] : $modelsVrijednostAtributa,
        ]);
    }
	


    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $atribut = $model->nazivAtr;
		
		try {
			$model->delete();
			Yii::$app->session->setFlash('success', 'Record  <strong>"' . $atribut. '"</strong> deleted successfully.');

		} catch (\yii\db\Exception $e) {
			  if ($e->errorInfo[1] == 1451) {
        throw new \yii\web\HttpException(400, 'Failed to delete the object.');
			 } else {
        throw $e;
		}
}

        return $this->redirect(['index']);
    }


	public function actionLists($id){

		$countAtributi = Atribut::find()->innerJoinWith('kategorije')
								->where(['kategorija.katID'=>$id])
								->count();

		if($countAtributi > 0){
			$atributi = Atribut::find()->innerJoinWith('kategorije')
								->where(['kategorija.katID'=>$id])
								->asArray()
								->all();
		
		print_r($atributi);

		/*	foreach($atributi as $atribut){
				echo $atribut->nazivAtr;
				echo '<br>';
				$values=VrijednostAtributa::find()->where(['atrID'=>$atribute->atrID])
													->all();
				foreach($values as $value){
					echo $value->vrijednost;
					echo '</br>';
				}
		}	
		
		*/	

		//foreach($atributi as $atribut){
			//echo "<option value='". $atribut->atrID ."'>" .$atribut->nazivAtr ."</option>";

			//echo "<label>" .$atribut->nazivAtr ."</label>";
			//$vrijednosti = VrijednostAtributa::find()->where(['atrID' => $atribut->atrID])->all();
			//echo '<select>';
			//Atribut::getPa($vrijednosti);
			//echo '</select>';
		//	echo '<br>';

		//}

	}else{
		//echo "<option></option>";
	}

		
	}





}



