<?php
require 'DB.php';

class ArticleDB extends DB
{

    public function __construct()
    {
        parent::__construct();
        parent::connectToDb();
    }

    public function addArticle($title, $intro, $text, $author){
        try {
            $sql = 'INSERT INTO articles(title, intro, text, date, author) VALUES(?, ?, ?, ?, ?)';
            $query = $this->connectToDb()->prepare($sql);
            $query->execute([$title, $intro, $text, time(), $author]);
        } catch (Exception $e) {
            echo 'Error: #' . $e;
        }
    }

    public function getArticles(){
        try {
            $sql = 'SELECT * FROM articles ORDER BY date DESC';
            $query = $this->connectToDb()->query($sql);
        } catch (Exception $e) {
            echo 'Error: #' . $e;
        } finally {
            return $query;
        }
    }

}