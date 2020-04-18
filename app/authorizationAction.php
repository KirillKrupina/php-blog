<?php
require_once '../app/DB.php';

$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

$error = '';
if ($email == "") {
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
        $db = new DB();
        $user = $db->authUser($email, $password);
        if ($user->ID == 0) {
            echo 'User not found';
        } else {
            setcookie('log', $user->login, time() + 3600, "/");
            echo 'Success';
        }
    } catch (Exception $e) {
        echo 'Error: #' . $e;
    }
}

