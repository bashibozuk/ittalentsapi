<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/20/14
 * Time: 7:40 PM
 */

namespace app\controllers;


use app\models\Users;
use yii\rest\Controller;

class TestController extends Controller{
    public $modelClass = 'app\models\Users';
} 