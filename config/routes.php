<?php

return array
(
    'search' => 'search/search',
    'news/([0-9]+)' => 'news/view/$1', // actionView в NewsController
    'main' => 'main/main',
    'main/page?page=$1' => 'main/main',
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
    'addnews' => 'news/add',
    'update/([0-9]+)' => 'news/updateNews/$1',
    'delete/([0-9]+)' => 'news/deleteNews/$1',
    //'search' => 'main/search',
    'form' => 'form/send',
);