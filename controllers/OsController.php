<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Os;
use app\models\OsPretraga;
use app\models\VrijednostOs;
use app\models\VrijednostAtributa;
use app\models\Atribut;
use app\models\Model;
use app\base\ParentModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OsController implements the CRUD actions for Os model.
 */
class OsController extends Controller
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
                    'actions' => ['index','view'],                                     
                    'allow' => true,
                    'roles' => ['serviser'],
                ],
                [    // all the actions are accessible administrator
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
     * Lists all Os models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OsPretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    /**
     * Displays a single Os model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){

		$sredstva = Os::find()->with('vrijednostAtributa')->where(['osID' => $id])->ALL();
			return $this->render('view', ['sredstva' => $sredstva]);
    }


    /**
     * Updates an existing Os model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->osID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


	 public function actionCreate()
    {
        $model = new Os();
		$modelAtribut=new Atribut;
		$modelsVrijednost = [new VrijednostOs()];


		if($model->load(Yii::$app->request->post())){
		
			$modelsVrijednost = Model::createMultiple(VrijednostOs::className());
			Model::loadMultiple($modelsVrijednost, Yii::$app->request->post());
		
		            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsVrijednost),
                    ActiveForm::validate($model)
                );
            }
			

				$valid = $model->validate();
				$valid = Model::validateMultiple($modelsVrijednost) && $valid;

				if ($valid) {
					$transaction = \Yii::$app->db->beginTransaction();

					try {
						if ($flag = $model->save(false)) {
							foreach ($modelsVrijednost as $modelVrijednost) {
								$modelVrijednost->osID = $model->osID;
								if (! ($flag = $modelVrijednost->save(false))) {
									$transaction->rollBack();
									break;
								}
							}
						}
						if ($flag) {
							$transaction->commit();
							return $this->redirect(['view', 'id' => $model->osID]);
						}
					} catch (Exception $e) {
						$transaction->rollBack();
					}
				}
		}

        return $this->render('create', [
            'model' => $model,
			'modelAtribut'=>$modelAtribut,
			'modelsVrijednost' => (empty($modelsVrijednost)) ? [new VrijednostOs] : $modelsVrijednost,
	
        ]);
    }












    /**
     * Deletes an existing Os model.
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
     * Finds the Os model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Os the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Os::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}



