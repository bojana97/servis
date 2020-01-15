<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Os;
use app\models\OsPretraga;
use app\models\VrijednostOs;
use app\models\VrijednostAtributa;
use app\models\Atribut;
use app\models\Kategorija;
use app\models\Model;
use app\base\ParentModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class OsController extends Controller
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
        $searchModel = new OsPretraga();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	

    public function actionView($id){

		$sredstva = Os::find()->with('vrijednostAtributa')->where(['osID' => $id])->ALL();
			return $this->render('view', ['sredstva' => $sredstva]);
    }



    public function actionUpdate($id)
    {
       /* 

       if ($modelOs->load(Yii::$app->request->post()) && $modelOs->save()) {
            return $this->redirect(['view', 'id' => $modelOs->osID]);
       }
	*/

		$modelOs = $this->findModel($id);



        return $this->render('update', [
            'modelOs' => $modelOs,
        ]);




    }


	 public function actionCreate()
    {
		$modelOs = new Os();
		$modelsVrijednostOs = [new VrijednostOs()];

        
		if($modelOs->load(Yii::$app->request->post())){
			$modelsVrijednostOs = Model::createMultiple(VrijednostOs::className());
			Model::loadMultiple($modelsVrijednostOs, Yii::$app->request->post());

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsVrijednostOs),
                    ActiveForm::validate($modelOs)
                );
            }
				$valid = $modelOs->validate();

				$valid = Model::validateMultiple($modelsVrijednostOs) && $valid;


				if ($valid) {
				
					$transaction = \Yii::$app->db->beginTransaction();

					try {
						if ($flag = $modelOs->save(false)) {
							foreach ($modelsVrijednostOs as $modelVrijednostOs) {
								$modelVrijednostOs->osID = $modelOs->osID;
								if (! ($flag = $modelVrijednostOs->save(false))) {
									$transaction->rollBack();
									break;
								}
							}
						}
						if ($flag) {
							$transaction->commit();
							return $this->redirect(['view', 'id' => $modelOs->osID]);
						}
					} catch (Exception $e) {
						$transaction->rollBack();
					}
				}
		}
		

        return $this->render('create', [
            'modelOs' => $modelOs,
			'modelsVrijednostOs' => (empty($modelsVrijednostOs)) ? [new VrijednostOs] : $modelsVrijednostOs,
	
        ]);
    }





    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Os::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


	public function actionList($id)
	{
		$modelsVrijednostOs = [new VrijednostOs()];

		$atributiKategorije = Kategorija::find()->innerJoinWith('atributi')
									->where(['kategorija.katID'=>$id])
									->asArray()
									->all();

		$count = Kategorija::find()->innerJoinWith('atributi')
									->where(['kategorija.katID'=>$id])
									->count();

        for($i = 1; $i < $count; $i++) {
             $modelsVrijednostOs[] = new VrijednostOs();
        }
									
		return $this->renderPartial('_form_atributi',
							['atributiKategorije' => $atributiKategorije,
							'modelsVrijednostOs' => $modelsVrijednostOs]);	
	}



}



