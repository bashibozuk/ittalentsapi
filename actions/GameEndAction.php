<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 11:28 PM
 */

namespace app\actions;


use app\models\GamePlay;
use yii\rest\Action;
use yii\web\ForbiddenHttpException;

class GameEndAction extends Action{
    public $modelClass = 'app\models\GamePlay';

    public function run($id, $user_id, $score)
    {
        /**
         * @var GamePlay $model
         */
        $model = $this->findModel($id);
        if ($model->user_id != $user_id) {
            throw new ForbiddenHttpException();
        }
        $model->setScenario('end');
        $model->score = $score;
        $model->end_time = time();

        if (!$model->save()) {
            return ['errors' => $model->getErrors()];
        }

        return $model->attributes;
    }
} 