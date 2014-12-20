<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/20/14
 * Time: 12:03 PM
 */

namespace app\components;


use yii\base\Object;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\rest\Action;

class DataProviderPreparator extends Object
{

    public static function prepareDataProvider(Action $action)
    {
        $modelClass = $action->modelClass;

        /**
         * @var ActiveQuery $query
         */
        $query = $modelClass::find();
        /**
         * @var ActiveRecord $model
         */
        $model = new $modelClass;

        $query->andWhere('game_id = :game_id', [':game_id' => Context::getInstance()->gameID]);

        if (Context::getInstance()->sortField && $model->hasAttribute(Context::getInstance()->sortField)) {
            $direction = Context::getInstance()->sortType;
            $query->orderBy = [Context::getInstance()->sortField => ($direction == Context::SORT_DESC ? SORT_DESC  : SORT_ASC)];
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);

    }
} 