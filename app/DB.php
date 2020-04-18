<?php


class DB
{
    private $db_user;
    private $db_password;
    private $db;
    private $host;

    public function __construct()
    {
        $this->db_user = 'root';
        $this->db_password = '';
        $this->db = "php_web_blog";
        $this->host = "127.0.0.1";
    }

    private function connectToDb()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
            return new PDO($dsn, $this->db_user, $this->db_password);
        } catch (mysqli_sql_exception $e) {
            echo 'Error: #' . $e;
        }
    }

    public function regUser($login, $email, $password)
    {
        try {
            $password = md5($password);
            $sql = 'INSERT INTO users(login, email, password) VALUES(?, ?, ?)';
            $query = $this->connectToDb()->prepare($sql);
            $query->execute([$login, $email, $password]);
        } catch (mysqli_sql_exception $e) {
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
        } catch (mysqli_sql_exception $e) {
            echo 'Error: #' . $e;
        }
    }

}