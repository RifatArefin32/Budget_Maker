<?php

namespace app\modules\budget\controllers;
use app\models\Expense;
use Yii;
use yii\web\NotFoundHttpException;
/**
 * Default controller for the `budget` module
 */
class ExpenseController extends \yii\rest\ActiveController
{
   public $modelClass = 'app\models\Expense';
   
   public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class'=> \yii\filters\auth\HttpBearerAuth::className(),
        ] ;
        return $behaviors;
   }


   public function actions(){
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['update']);
        return $actions;
   }

   public function actionCreate(){
        $model = new $this->modelClass;
        if($model->load(Yii::$app->request->post(), '')){
            if($model->validate()){
                $model->remainingAmount();
                $model->save();
                return(
                    [
                        'status'=> 'Success',
                        "data"=> $model,
                    ]
                );
            }
            else{
                return [
                    "status"=> "success",
                    "errors"=> $model->errors,
                ];
            }
        }
   }

   public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if ($model->delete()) {
            return [
                'status' => 'success',
                'message' => 'Expense field deleted successfully.',
            ];
        } else {
            Yii::$app->response->statusCode = 500;
            return [
                'status' => 'error',
                'message' => 'Failed to delete the expense field.',
            ];
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->post(), '');
        $model->remainingAmount();
        if ($model->validate() && $model->save()) {
            return [
                'status' => 'success',
                'message' => 'Expense updated successfully.',
                'data' => $model,
            ];
        } else {
            Yii::$app->response->statusCode = 422;
            return [
                'status' => 'error',
                'errors' => $model->errors,
            ];
        }
    }

    protected function findModel($id)
    {
        if (($model = Expense::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested expense field does not exist.');
    }
}
