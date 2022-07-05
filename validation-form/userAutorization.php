<?php
    session_start();
    $user_auth = isset($_SESSION['user']);
    if($user_auth){
        header('Location: profile.php');
    }
    include("../config/database.php");
    $errors = [];

    $login = filter_var(trim($_POST['login']),
        FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
        FILTER_SANITIZE_STRING);


    $pass = md5($pass."qwerty12345");


    $result = $mysql->query("SELECT * FROM users WHERE login = '$login' AND pass = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        $errors[] = "Неверный логин или пароль";
        $_SESSION['errors'] = $errors;
        header('Location: ../index.php');
        exit();
    }

    $_SESSION['user'] = $user['id'];

$mysql->close();

header('Location: ../profile.php');

?>




