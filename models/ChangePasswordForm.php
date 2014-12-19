<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 10:46 PM
 */

namespace app\models;


use yii\base\Model;

class ChangePasswordForm extends  Model{

    public $email;

    public $password;

    public $password_repeat;

    private $_user;

    public function getUser()
    {
        return $this->_user;
    }

    public function rules()
    {
        return [
            [['email', 'password', 'password_repeat'], 'required'],
            [['email'], 'email'],
            [['password'], 'compare']
        ];
    }

    public function changePassword()
    {
        if ($this->_user = User::findOne(['email' => $this->email])) {
            $this->_user->password = $this->password;

            if($this->_user->save()) {
                return true;
            }

            $this->errors = $this->_user->getErrors();

        } else {
            $this->addError('email', 'Wrong email address');
        }

        return false;
    }
} 