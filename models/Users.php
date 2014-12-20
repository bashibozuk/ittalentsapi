<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $email
 * @property string $password
 * @property string $username
 * @property string $avatar
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id'], 'integer'],
            [['email', 'username', 'avatar', 'authKey', 'accessToken'], 'string'],
            [['username'], 'unique'],
            [['password'], 'required'],
            [['password'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'email' => 'Email',
            'password' => 'Password',
            'username' => 'Username',
            'avatar' => 'Avatar',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
}
