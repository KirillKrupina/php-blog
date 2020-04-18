<?php


abstract class DB
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

    protected function connectToDb()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
            return new PDO($dsn, $this->db_user, $this->db_password);
        } catch (mysqli_sql_exception $e) {
            echo 'Error: #' . $e;
        }
    }
}
