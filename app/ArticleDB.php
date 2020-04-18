<?php
require 'DB.php';

class ArticleDB extends DB
{

    public function __construct()
    {
        parent::__construct();
        parent::connectToDb();
    }

    public function addAricle($title, $intro, $text, $author){
        try {

            $sql = 'INSERT INTO articles(title, intro, text, date, author) VALUES(?, ?, ?, ?, ?)';
            $query = $this->connectToDb()->prepare($sql);
            $query->execute([$title, $intro, $text, time(), $author]);
        } catch (mysqli_sql_exception $e) {
            echo 'Error: #' . $e;
        }
    }

}