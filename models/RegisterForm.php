<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/13/14
 * Time: 10:05 PM
 */

namespace app\models;


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
            [['username', 'email', 'password', 'password_repeat', /*'captcha'*/], 'required'],
          //  [['captcha'], 'captcha'],
            [['password'], 'compare'],
            [['email'], 'email'],
            [['avatar'], 'string']
        ];
    }

    public function register()
    {
        $this->_user = new User();
        $this->_user->attributes = array_intersect_key($this->attributes, $this->_user->attributes);

        return $this->_user->save();
    }
} 