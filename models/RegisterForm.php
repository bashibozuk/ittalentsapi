<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 10:05 PM
 */

namespace app\models;


use app\components\Context;
use yii\base\Model;

class RegisterForm extends Model {

    public $username;

    public $email;

    public $password;

    public $password_repeat;

    public $avatar;

  //  public $captcha;

    private $_user;

    public function getUser()
    {
        return $this->_user;
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat',], 'required'],
            [['password'], 'compare'],
            [['email'], 'email'],
            [['avatar'], 'string']
        ];
    }

    public function register()
    {
        $this->_user = new User();
        $this->_user->attributes = array_intersect_key($this->attributes, $this->_user->attributes);
        $this->_user->game_id = Context::getInstance()->gameID;

        $attrNames = array_keys($this->attributes);
        if (!$this->_user->save()) {
            foreach ($this->_user->getErrors() as $field => $error) {
                if (in_array($field, $attrNames)) {
                    $this->addError($field, $error);
                }
            }

            return false;
        }

        return true;
    }
} 