<?php
require 'DB.php';

class UserDB extends DB
{

    public function __construct()
    {
        parent::__construct();
        parent::connectToDb();
    }

    public function regUser($login, $email, $password)
    {
        try {
            $password = md5($password);
            $sql = 'INSERT INTO users(login, email, password) VALUES(?, ?, ?)';
            $query = $this->connectToDb()->prepare($sql);
            $query->execute([$login, $email, $password]);
        } catch (Exception $e) {
            echo 'Error: #' . $e;
        }
    }

    public function authUser($email, $password) {
        try {
            $password = md5($password);
            $sql = 'SELECT ID, login FROM users WHERE email = :email && password = :password';
            $query = $this->connectToDb()->prepare($sql);
            $query->execute(['email' => $email, 'password' => $password]);

            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo 'Error: #' . $e;
        }
    }

}