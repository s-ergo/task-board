<?php

namespace controllers;

use models\Task;
use view\View;


class SiteController
{
    public static function actionIndex($params)
    {
        session_start();
        $params = explode(',', $params);

        $page = (int) $params[1];
        $perPage = 3;
        $start = ($page - 1) * $perPage;

        $sort = explode('-', $params[0]);
        $sortableFields = ['username', 'email', 'status'];
        $sortDirections = ['asc', 'desc'];
        $sortString = "id desc";

        if (in_array($sort[0], $sortableFields) &&
            in_array($sort[1], $sortDirections)) {
                $sortString = "$sort[0] $sort[1]";
        };

        $model = new Task;
        $tasks = $model->getSeveralTasks($sortString, $start, $perPage);
        $count = $model->getCount();

        (new View)->render('default', [
            'tasks' => $tasks,
            'count' => $count,
            'page' => $page,
            'perPage' => $perPage,
        ]);

        $_SESSION['notice'] = "";
    }


    public static function actionAddTask()
    {
        session_start();

        if (!$_POST) {
            (new View)->render('taskForm');
            exit;
        }

        $name = self::sanitizer($_POST['name'], FILTER_SANITIZE_STRING, 35);
        $email = self::sanitizer($_POST['email'], FILTER_VALIDATE_EMAIL, 35);
        $task = self::sanitizer($_POST['task'], FILTER_DEFAULT, 1000);
        $status = self::sanitizer($_POST['status'], FILTER_SANITIZE_STRING, 35);

        if (!$name || !$email || !$task) {
            (new View)->render('taskForm');
            exit;
        }

        $id = (int) $_POST['id'];
        $original = $_POST['original'];
        $edited = '';

        if ($id && (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')) {
            (new View)->render('login', ['error' => '']);
            exit;
        }

        if ($id && $task !== $original) {
            $edited = 'отредактировано администратором';
        }


        if ((new Task)->addTask($id, $name, $email, $task, $edited, $status)) {

            $notice = '<div class="alert alert-success" role="alert">
                        Задание успешно добавлено!</div>';

            if ($id) {
                $notice = '';
            }

            $_SESSION['notice'] = $notice;
            header('Location: /');
        }
    }


    public static function actionEditTask($id)
    {
        $task = (new Task)->getOne($id);

        $_POST['name'] = htmlentities($task['username']);
        $_POST['email'] = htmlentities($task['email']);
        $_POST['status'] = htmlentities($task['status']);
        $_POST['task'] = htmlentities($task['task']);
        $_POST['original'] = htmlentities($task['task']);
        $_POST['id'] = $task['id'];

        (new View)->render('taskForm');
    }


    public static function actionChangeStatus()
    {
        session_start();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') return;

        $data = file_get_contents('php://input');
        $request = json_decode($data, true);
        $id = (int) $request['id'];
        $status = ($request['status'] === 'выполнено') ? 'выполнено' : '';

        (new Task)->changeStatus($id, $status);
    }


    public static function sanitizer($data, $filter, $length)
    {
        $result = mb_substr(trim($data), 0, $length, 'UTF-8');
        $result = filter_var($result, $filter);
        return $result;
    }
}
