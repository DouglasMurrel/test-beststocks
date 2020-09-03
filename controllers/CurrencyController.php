<?php


namespace app\controllers;


use app\models\Currency;
use app\models\User;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;

class CurrencyController extends ActiveController
{
    public $modelClass = 'app\models\Currency';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON
            ],
        ];
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
        ];

        return $behaviors;
    }
}