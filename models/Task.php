<?php

namespace models;

use config\DB;


class Task
{
    private static $pdo = null;

    public function __construct()
    {
        if (!self::$pdo) {
            self::$pdo = (new DB)::$pdo;
        }
    }


    public static function getSeveralTasks($sortString, $start, $perPage)
    {
        $query = "SELECT * FROM `tasks`
                  ORDER BY " . $sortString . "
                  LIMIT ?,?
                  ";

        $stmt = self::$pdo->prepare($query);
        $stmt->execute([$start, $perPage]);
        return $stmt->fetchAll();
    }


    public static function getCount()
    {
        $query = "SELECT count(`id`) FROM `tasks`";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    public function getOne($task_id)
    {
        $query = "SELECT * FROM `tasks`
                  WHERE id = ?
                  ";

        $stmt = self::$pdo->prepare($query);
        $stmt->execute([$task_id]);
        return $stmt->fetch();
    }


    public function addTask($id, $name, $email, $task, $edited, $status)
    {
        $query = "REPLACE INTO `tasks` (id, username, email, task, edited, status)
                  VALUES ( ?, ?, ?, ?, ?, ? )
                  ";

        $stmt = self::$pdo->prepare($query);
        return $stmt->execute([$id, $name, $email, $task, $edited, $status]);
    }


    public function changeStatus($id, $status)
    {
        $query = "UPDATE `tasks`
                  SET status = ?
                  WHERE	id = ?
                  ";

        $stmt = self::$pdo->prepare($query);
        $stmt->execute([$status, $id]);
    }


    public function tasksTableMaker()
    {
        $query = "CREATE TABLE IF NOT EXISTS `tasks` (
            id INT(11) NOT NULL AUTO_INCREMENT,
            username CHAR(250) NOT NULL,
            email CHAR(250) NOT NULL,
            task TEXT NOT NULL,
            status CHAR(250) NOT NULL,
            edited CHAR(50) NOT NULL,
            PRIMARY KEY (id)
          )";

        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
    }
}
