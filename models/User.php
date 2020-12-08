<?php

namespace models;

use config\DB;


class User
{
    private static $pdo = null;

    public function __construct()
    {
        if (!self::$pdo) {
            self::$pdo = (new DB)::$pdo;
        }
    }


    public function auth($username, $password)
    {
        $query = "SELECT `role` FROM `users`
                 WHERE username = ?
                 AND password = ?
                 LIMIT 1
        ";

        $stmt = self::$pdo->prepare($query);
        $stmt->execute([$username, $password]);
        return $stmt->fetch();
    }


    public function usersTableMaker()
    {
        $query = "CREATE TABLE IF NOT EXISTS `users` (
            id INT(11) NOT NULL AUTO_INCREMENT,
            username CHAR(250) NOT NULL,
            password CHAR(250) NOT NULL,
            role CHAR(250) NOT NULL DEFAULT '',
            PRIMARY KEY (id)
          )";

        $stmt = self::$pdo->prepare($query);
        return $stmt->execute();
    }


    public function addAdmin()
    {
        $password = crypt(123, '$2a$07$usesBo6mesillys7trin9gforCsalt$');

        $query = "INSERT `users` (id, username, password, role) 
                  VALUES (0, 'admin', ?, 'admin') ";

        $stmt = self::$pdo->prepare($query);
        if (!$this->auth('admin', $password)) {
            $stmt->execute([$password]);
        }
    }
}
