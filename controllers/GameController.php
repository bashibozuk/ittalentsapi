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
use app\components\BaseController;
use app\components\GameDataProviderPreparator;
use app\models\GamePlay;
use yii\helpers\ArrayHelper;
use yii\rest\IndexAction;

class GameController extends BaseController
{
    public $modelClass = 'app\models\User';

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
                'prepareDataProvider' => [GameDataProviderPreparator::className(), 'prepareDataProvider']
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
