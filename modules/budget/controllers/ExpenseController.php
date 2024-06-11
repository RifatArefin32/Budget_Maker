<?php

namespace app\modules\budget\controllers;
use app\models\Expense;
use app\models\User;

use Yii;
use yii\web\NotFoundHttpException;
/**
 * Default controller for the `budget` module
 */
class ExpenseController extends \yii\rest\ActiveController
{
   public $modelClass = 'app\models\Expense';
   
    // Http Bearer Token Authentication **
    // public function behaviors(){
    //         $behaviors = parent::behaviors();
    //         $behaviors['authenticator'] = [
    //             'class'=> \yii\filters\auth\HttpBearerAuth::className(),
    //         ] ;
    //         return $behaviors;
    // }

    // Http Basic Authentication with access-token**
    // public function behaviors(){
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class'=> \yii\filters\auth\HttpBasicAuth::className(),
    //     ] ;
    //     return $behaviors;
    // }

    // Http Basic Authentication with username, password**
    // public function behaviors(){
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class'=> \yii\filters\auth\HttpBasicAuth::className(),
    //         'auth' => function ($username, $password) {
    //                 $user = User::find()->where(['username' => $username])->one();
    //                 if ($user && $user->validatePassword($password)) {
    //                     return $user;
    //                 }
    //                 return null;
    //             },
    //     ] ;
    //     return $behaviors;
    // }

    // Http Query Param Authentication **
    // public function behaviors(){

    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class'=> \yii\filters\auth\QueryParamAuth::className(),
    //         // usually it takes "access-token" as the parameter but we can 
    //         // change it as well.
    //         // 'tokenParam'=> 'auth_key',
    //         'tokenParam'=> 'test_api'
    //     ];
    //     return $behaviors;
    // }

    // Http Composite Authentication **
    // public function behaviors(){
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class' => \yii\filters\auth\CompositeAuth::class,
    //         'authMethods' => [
    //             [
    //                 'class'=> \yii\filters\auth\HttpBasicAuth::class,
    //                 'auth' => function ($username, $password) {
    //                     $user = User::find()->where(['username' => $username])->one();
    //                     if ($user && $user->validatePassword($password)) {
    //                         return $user;
    //                     }
    //                     return null;
    //                 },
    //             ],
    //             \yii\filters\auth\HttpBasicAuth::class,
    //             \yii\filters\auth\QueryParamAuth::class, //can access by access-token param.
    //         ],
    //     ];
    //     return $behaviors;
    // }

    // Http Exclue End Point Authentication **
    // public function behaviors(){
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class' => \yii\filters\auth\HttpBasicAuth::class,
    //         'except'=> ['test'],
    //     ];
    //     return $behaviors;
    // }

    // Http Optional End Point Authentication **
    // public function behaviors(){
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class' => \yii\filters\auth\HttpBasicAuth::class,
    //         'optional'=> ['test'],
    //     ];
    //     return $behaviors;
    // }

     // Http Specific End Point Authentication **
     public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBasicAuth::class,
            'only'=> ['test', 'check', 'create'],
        ];
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

    public function actionTest(){
        return [
            'message' => 'This is Test action',
        ] ;
    }

    public function actionCheck(){
        return [
            'message' => 'This is Check action',
        ] ;
    }
    
}
