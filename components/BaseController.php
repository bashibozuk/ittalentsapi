<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/19/14
 * Time: 5:12 PM
 */

namespace app\components;


use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;

class BaseController  extends  Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => Cors::className(),
                'cors' => [   // restrict access to
                    'Origin' => [ArrayHelper::getValue($_SERVER, 'HTTP_ORIGIN', '*')],
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET', 'PATCH', 'DELETE', 'OPTIONS'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                 ]
            ],
            [
                'class' => GameFilter::className(),
            ],
        ]);
    }

//    public function afterAction($action, $result)
//    {
//        $httpOrigin = ArrayHelper::getValue($_SERVER, 'HTTP_ORIGIN', '*');
//        // CORS ajax request
//        header('Access-Control-Allow-Origin: ' . $httpOrigin);
//        header('Access-Control-Allow-Credentials: true');
//        header('Access-Control-Allow-Headers: *');
//        header('Access-Control-Expose-Headers: *');
//        //header('Access-Control-Expose-Headers: X-Pagination-Current-Page, X-Pagination-Page-Count, X-Pagination-Per-Page, X-Pagination-Total-Count');
//
//
//        return parent::afterAction($action, $result);
//    }
} 