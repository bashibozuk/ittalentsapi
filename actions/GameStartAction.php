<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 11:10 PM
 */

namespace app\actions;


use app\components\Context;
use app\models\GamePlay;
use yii\rest\Action;

/**
 * Class GameStartAction
 * @package app\actions
 */
class GameStartAction extends Action
{
    public $modelClass = 'app\models\GamePlay';

    /**
     * @param $game_id
     * @param $user_id
     * @return array
     */
    public function run($user_id)
    {
        $model = new GamePlay();
        $model->setScenario('start');
        $model->start_time = time();
        $model->game_id = Context::getInstance()->gameID;
        $model->user_id =$user_id;

        if ($model->save()) {
            return $model->attributes;
        }

        return $model->errors;
    }
} 