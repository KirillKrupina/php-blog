<?php
require_once '../app/ArticleDB.php';

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($title) <= 3) {
    $error = 'Your article title should be more than 6 symbols';
} else if (strlen($intro) <= 15) {
    $error = 'Your article intro should be more than 15 symbols';
} else if (strlen($text) <= 20) {
    $error = 'Your article text should be more than 20 symbols';
}

if ($error != '') {
    exit();
} else {
    try {
        $db = new ArticleDB();
        $author = $_COOKIE['log'];
        $article = $db->addAricle($title, $intro, $text, $author);
        echo 'Success';
    } catch (Exception $e) {
        echo 'Error: #' . $e;
    }
}

