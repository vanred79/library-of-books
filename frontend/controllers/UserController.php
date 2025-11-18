<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => \frontend\components\JwtHttpBearerAuth::class,
            'except' => ['create'],
        ];

        return $behaviors;
    }

    public function actionLogin()
    {
        $request = Yii::$app->request->post();

        $username = $request['username'] ?? null;
        $password = $request['password'] ?? null;

        $user = User::findOne(['username' => $username]);
        if ($user && Yii::$app->security->validatePassword($password, $user->password_hash)) {
            // например, возвращаем auth_key
            return [
                'success' => true,
                'auth_key' => $user->auth_key,
            ];
        }

        return [
            'success' => false,
            'message' => 'Неверный логин или пароль',
        ];
    }

    public function beforeAction($action)
    {
        // Отключаем CSRF для REST
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}
