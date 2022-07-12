<<?php 
session_start();
$user_auth = isset($_SESSION['user']);
    if(!$user_auth){
    header('Location: /');
    }

    include("../config/database.php");
    $old_pass = filter_var(trim($_POST['old_pass']),
    FILTER_SANITIZE_STRING);
    $new_pass = filter_var(trim($_POST['new_pass']),
    FILTER_SANITIZE_STRING);
    $new_pass_confirm = filter_var(trim($_POST['new_pass_confirm']),
    FILTER_SANITIZE_STRING);

    $errors=[];

    if(mb_strlen($new_pass) < 2 || mb_strlen($new_pass) > 10) {
        $errors[] =  "Недопустимая длина пароля (от 2 до 10 символов)";
    }
    if ($new_pass !== $new_pass_confirm){
        $errors[] = "Пароли не совпадают";
    }

    $pass = md5($pass."qwerty12345");

    $result = $mysql->query("SELECT * FROM users WHERE  pass = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        $errors[] = "Неверно введен старый пароль";
        $_SESSION['errors'] = $errors;
        header('Location: ../index.php');
        exit();
    }

    $_SESSION['user'] = $user['id'];

    $mysql->close();

    header('Location: ../settingsProfile.php');

?>