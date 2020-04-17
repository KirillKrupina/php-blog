<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

if ($login == "" && strlen($login) <= 3) {
    exit();
} else if ($email == "") {
    exit();
} else if ($password == "" && strlen($password) <= 3) {
    exit();
}

$password = md5($password);

$db_user = 'root';
$db_password = '';
$db = "php_web_blog";
$host = "127.0.0.1";

$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $db_user, $db_password);
$sql = 'INSERT INTO users(login, email, password) VALUES(?, ?, ?)';
$query = $pdo->prepare($sql);
$query -> execute([$login, $email, $password]);
