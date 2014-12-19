<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 11:08 PM
 */

namespace app\controllers;

use app\actions\GameEndAction;
use app\actions\GameStartAction;
use app\models\GamePlay;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\rest\IndexAction;

class GameController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\User';

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
            'game-start' => [
                'class' => GameStartAction::className()
            ],
            'game-end' => [
                'class' => GameEndAction::className()
            ],
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => GamePlay::className(),
            ]
        ];
    }

    protected function verbs()
    {
        return [
            [
                'game-start' => ['POST', 'GET'],
                'game-end' => ['POST', 'GET'],
            ]
        ];
    }
}
