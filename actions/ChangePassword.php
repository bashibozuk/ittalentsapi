<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 10:45 PM
 */

namespace app\actions;


use app\models\ChangePasswordForm;
use yii\rest\Action;

/**
 * Class ChangePassword
 * @package app\actions
 */
class ChangePassword extends Action{

    public $modelClass = 'app\models\ChangePasswordForm';

    /**
     * @return array|bool
     */
    public function run()
    {
        $model = new ChangePasswordForm();
        if ($model->load(\Yii::$app->request->bodyParams, '') && $model->validate() && $model->changePassword()) {
            return true;
        }

        return ['errors' => $model->getErrors()];
    }
} 