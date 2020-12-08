<?php

return [
    'sort-(\w{4,8}-\w{3,4})/page([1-9][0-9]*$)' => 'site/index/$1,$2',
    'sort-(\w{4,8}-\w{3,4})' => 'site/index/$1,1',
    'page([1-9][0-9]*$)' => 'site/index/id-desc,$1',
    'edit/([1-9][0-9]*$)' => 'site/edit-task/$1',
    'add' => 'site/add-task',
    'status' => 'site/change-status',
    'login' => 'user/login',
    'logout' => 'user/logout',
    '' => 'site/index/id-desc,1',
];
