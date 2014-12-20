<?php

namespace app\controllers;

use app\components\BaseController;
use app\components\DataProviderPreparator;
use yii\helpers\ArrayHelper;

class UsersController extends BaseController
{
    public $modelClass = 'app\models\User';

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result)
    {
        if ($httpOrigin = ArrayHelper::getValue($_SERVER, 'HTTP_ORIGIN')) {
            // CORS ajax request
            header('Access-Control-Allow-Origin: ' . $httpOrigin);
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: X-PINGOTHER');
        }


        return parent::afterAction($action, $result);
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => [DataProviderPreparator::className(), 'prepareDataProvider']
            ],
            'login' => [
                'class' => 'app\actions\LoginAction'
            ],
            'register' => [
                'class' => 'app\actions\RegisterAction'
            ],
            'change-password' => [
                'class' => 'app\actions\ChangePassword'
            ]
        ];
    }

    protected function verbs()
    {
        return array_merge(parent::verbs(), [
            [
                'login' => 'POST',
                'register' => 'POST',
                'change-password' => 'POST'
            ]
        ]);
    }
}
