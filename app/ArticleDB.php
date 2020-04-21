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

    public function getArticleById($id){
        try {
            $sql = "SELECT * FROM articles WHERE id = $id";
            $query = $this->connectToDb()->query($sql);
        } catch (Exception $e) {
            echo 'Error: # ' . $e;
        } finally {
            return $query;
        }
    }

    public function addComment($username, $comment, $article_id){
        try {
            $sql = 'INSERT INTO comments(username, comment, article_id) VALUES(?, ?, ?)';
            $query = $this->connectToDb()->prepare($sql);
            $query->execute([$username, $comment, $article_id]);
        } catch (Exception $e) {
            echo 'Error: #' . $e;
        }
    }

    public function getComments($article_id){
        try {
            $sql = "SELECT * FROM comments WHERE article_id = :id ORDER BY id DESC";
            $query = $this->connectToDb()->prepare($sql);
            $query->execute(['id' => $article_id]);

            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo 'Error: #' . $e;
        }
    }

}