<?php 

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use app\models\User;
use app\models\SignupForm;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        // unset($actions['update']);
        // unset($actions['delete']);
        return $actions;
    }

    public function actionCreate()
    {
        $user= new $this->modelClass;
        if($user->load(Yii::$app->request->post(), '')){

            return $user;
            // return "bkgjdfbgjdbg";
            
            // $user->password = $user
            // $user->setPassword($user->password);
            // $user->generateAuthKey();
            // $user->generatePasswordResetToken();
            // $user->generateEmailVerificationToken();
            // return ($user->save());
        }

        return false;


        //$model -> load(Yii::$app->request->getBodyParams());
        // $model->load(Yii::$app->request->post(), '');
        
        // return $model->password;

        // if ($model->load(Yii::$app->request->getBodyParams())) {
        //     // return ['status' => 'success', 'data' => $model];
        //     return "jflggl";
        // }
        // else{
        //     return ['status'=> 'error','errors'=> $model->errors];
        // }
        
        
        // if ($model->load(Yii::$app->request->getBodyParams(),'') && $model->save()) {
        //     return ['status' => 'success', 'data' => $model];
        // }
        // else{
        //     return ['status'=> 'error','errors'=> $model->errors];
        // }
    }
}