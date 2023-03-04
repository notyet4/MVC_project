<?php

return array
(
    'news/([0-9]+)' => 'news/view/$1', // actionView в NewsController
    'main' => 'main/main',
    'main/page?page=$1' => 'main/main',
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
);