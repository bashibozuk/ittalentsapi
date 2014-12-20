<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/19/14
 * Time: 4:46 PM
 */
namespace app\components;
use \yii\base\ActionFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotAcceptableHttpException;

class GameFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        $gameID = \Yii::$app->request->headers->get('X-GameID');
        if (!in_array($gameID, Game::$ids)) {
            throw new NotAcceptableHttpException('Provide valid X-GameID header');
            return false;
        }

        Context::getInstance()->gameID = $gameID;

        if ($field = ArrayHelper::getValue($_GET, 'sortField', 'id')) {
            Context::getInstance()->sortField = $field;
        }

        if ($direction = ArrayHelper::getValue($_GET, 'sortDirection', Context::SORT_ASC)) {
            Context::getInstance()->sortType = in_array($direction, [Context::SORT_ASC, Context::SORT_DESC]) ?
                                                    $direction :
                                                    Context::SORT_ASC;
        }

        if ($perPage = ArrayHelper::getValue($_GET, 'perPage', Context::PER_PAGE)) {
            $perPage = abs(intval($perPage));
            $perPage = in_array($perPage, [5, 10, 20]) ? $perPage : Context::PER_PAGE;

            Context::getInstance()->perPage = $perPage;
        }

        return true;
    }
} 