<?php

namespace app\controllers;

use app\components\BaseController;
use app\components\DataProviderPreparator;
use yii\helpers\ArrayHelper;

class UsersController extends BaseController
{
    public $modelClass = 'app\models\User';

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
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass
            ]
        ];
    }

    protected function verbs()
    {
        return array_merge(parent::verbs(), [
            [
                'login' => 'POST',
                'register' => 'POST',
                'change-password' => 'POST',
                'index' => 'GET',
                'view' => 'GET'
            ]
        ]);
    }
}
