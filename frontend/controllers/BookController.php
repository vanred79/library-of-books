<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\models\Books;

class BookController extends ActiveController
{
    public $modelClass = 'frontend\models\Books';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => \frontend\components\JwtHttpBearerAuth::class,
            'except' => ['index', 'view']
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        $query = Books::find()->orderBy(['created_at' => SORT_DESC]);
        return new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }

    public function beforeAction($action)
    {
        // Отключаем CSRF для REST
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}
