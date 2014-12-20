<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/19/14
 * Time: 5:12 PM
 */

namespace app\components;


use yii\filters\Cors;
use yii\rest\Controller;

class BaseController  extends  Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => GameFilter::className(),
            ],
            [
                'class' => Cors::className()
            ]
        ]);
    }
} 