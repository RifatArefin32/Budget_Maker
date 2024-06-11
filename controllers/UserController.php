<?php 

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\base\Response;
use app\models\User;
// use yii\web\Response;
use yii\web\NotFoundHttpException;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
    }

    public function actionCreate()
    {
        $user = new $this->modelClass;
        if($user->load(Yii::$app->request->post(), '')){

            if($user->validate()){
                $user->setPassword($user->password);
                $user->generateAuthKey();
                $user->generatePasswordResetToken();
                $user->generateEmailVerificationToken();
                $user->save();
                return ([
                    'status'=> 'success',
                    'data'=> $user,
                ]);
            }else{
                Yii::$app->response->statusCode = 422;
                return [
                    'status' => 'error',
                    'errors' => $user->errors,
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
                'message' => 'User deleted successfully.',
            ];
        } else {
            Yii::$app->response->statusCode = 500;
            return [
                'status' => 'error',
                'message' => 'Failed to delete the user.',
            ];
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->post(), '');
        if ($model->validate() && $model->save()) {
            return [
                'status' => 'success',
                'message' => 'User updated successfully.',
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

    // if (Yii::$app->user->isGuest) {
    //     return $this->redirect(['site/index']);
    // }

    public function actionDeleteAll()
    {
        User::deleteAll();
        return [
            'status' => 'success',
            'message' => 'All users are deleted successfully.',
        ];    
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested user does not exist.');
    }
}