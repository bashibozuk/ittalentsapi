<?php
//phpinfo();die;
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:' . realpath(dirname(__FILE__) . '/../runtime/ittalentsapi.sqlite'),
    'charset' => 'utf8',
];
