<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 9:30 PM
 */

namespace app\actions;


use app\models\LoginForm;
use yii\rest\Action;

/**
 * Class LoginAction
 * @package app\actions
 */
class LoginAction extends Action{

    public $modelClass = 'app\models\LoginForm';

    /**
     * @return array
     */
    public function run()
    {
        $form = new LoginForm();
        if ($form->load($_POST, '') && $form->validate() && $form->login()) {
            return $form->getUser()->attributes;
        }

        return ['errors' => $form->getErrors()];
    }
} 