<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 10:31 PM
 */

namespace app\actions;


use app\models\RegisterForm;
use yii\rest\Action;

/**
 * Class RegisterAction
 * @package app\actions
 */
class RegisterAction extends Action
{
    public $modelClass = 'app\models\RegisterFrom';

    /**
     * @return array
     */
    public function run()
    {
        $form = new RegisterForm();
        if ($form->load($_POST, '') && $form->validate() && $form->register()) {
            return $form->getUser();
        }

        return ['errors' => $form->getErrors()];
    }
} 