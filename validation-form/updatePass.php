<<?php 
session_start();
$user_auth = isset($_SESSION['user']);
    if(!$user_auth){
    header('Location: /');
    }
    $user_id = $_SESSION["user"];
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
    $old_pass = md5($old_pass."qwerty12345");
    $new_pass = md5($new_pass."qwerty12345");

    $result = $mysql->query("SELECT * FROM users WHERE  `pass` = '$old_pass' AND `id` = '$user_id'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        $errors[] = "Неверно введен старый пароль";
        $_SESSION['errors'] = $errors;
        header('Location: ../settingsProfile.php');
        exit();
    }

    $query = "UPDATE `users` SET `pass` = '$new_pass' WHERE `id` = '$user_id'";
    $mysql->query ($query);

    
    $_SESSION['success_msg'] = "Данные успешно обновленны";
    $mysql->close();

    header('Location: ../settingsProfile.php');

?>