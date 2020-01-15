<?php

namespace app\controllers;

class AuthAssignmentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

	protected function findModel($id)
	{
	    if (($model = AuthAssignment::findOne($id)) !== null) {
            return $model;
        }
	}

}
