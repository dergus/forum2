<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=forum2',
    'username' => 'roradmin',
    'password' => 'rorssap',
    'charset' => 'utf8',
    'on afterOpen' => function($event) {
                // $event->sender refers to the DB connection
    $event->sender->createCommand("SET time_zone='+00:00'")->execute();}
];
