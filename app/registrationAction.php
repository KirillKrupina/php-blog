<?php
require_once '../app/UserDB.php';


$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

$error = '';
    if ($login == "") {
        $error = 'Enter your login';
    } else if (strlen($login) <= 4) {
        $error = 'Your login should be more than 4 symbols';
    } else if ($email == "") {
        $error = 'Enter your email correctly';
    } else if ($password == "") {
        $error = 'Enter your password';
    } else if (strlen($password) <= 6) {
        $error = 'Your password should be more than 6 symbols';
    }

    if ($error != '') {
        exit();
} else {
    try {
        $db = new UserDB();
        $db->regUser($login, $email, $password);
        echo 'Success';
    } catch (Exception $e) {
        echo 'Error: #' . $e;
    }
}

