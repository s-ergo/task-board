<?php

namespace controllers;

use models\User;
use view\View;


class UserController
{
    public static function actionLogin()
    {
        session_start();

        if (!$_POST) {
            (new View)->render('login', ['error' => '']);
            exit;
        }

        $username = SiteController::sanitizer($_POST['username'], FILTER_SANITIZE_STRING, 35);
        $password = SiteController::sanitizer($_POST['password'], FILTER_DEFAULT, 35);
        $password = crypt($password, '$2a$07$usesBo6mesillys7trin9gforCsalt$');

        if (!(new User)->auth($username, $password)) {
            (new View)->render('login', ['error' => 'Неверное сочетание логин/пароль!']);
            exit;
        }

        $_SESSION['role'] = 'admin';
        header('Location: /');
    }

    public static function actionLogout()
    {
        session_start();
        setcookie(session_name(), '', 0);
        session_destroy();
        header('Location: /');
    }

}
