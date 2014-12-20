<?php
/**
 * Created by PhpStorm.
 * User: vasil
 * Date: 12/20/14
 * Time: 11:59 AM
 */

namespace app\components;


class Context
{
    const SORT_ASC = 'ASC';

    const SORT_DESC = 'DESC';

    const PER_PAGE = 10;

    private static $_instance;

    public $gameID;

    public $sortField;

    public $sortType;

    public $perPage;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
} 