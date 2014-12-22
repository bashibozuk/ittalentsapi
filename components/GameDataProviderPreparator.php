<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/20/14
 * Time: 2:43 PM
 */

namespace app\components;


use yii\data\ActiveDataProvider;
use yii\rest\Action;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class GameDataProviderPreparator extends DataProviderPreparator{

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

        $query->andWhere($modelClass::tableName() . '.game_id = :game_id', [':game_id' => Context::getInstance()->gameID]);
        $query->andWhere($modelClass::tableName() . '.score IS NOT NULL');
        if (Context::getInstance()->sortField && $model->hasAttribute(Context::getInstance()->sortField)) {
            $direction = Context::getInstance()->sortType;
            $query->orderBy = [Context::getInstance()->sortField => ($direction == Context::SORT_DESC ? SORT_DESC  : SORT_ASC)];
        }

        $query->joinWith('user');

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
} 