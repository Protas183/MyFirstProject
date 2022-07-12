<?php
    session_start();
    $user_auth = isset($_SESSION['user']);
    if($user_auth){
        header('Location: profile.php');
    }
    include("../config/database.php");
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
    $pass_confirm = filter_var(trim($_POST['pass_confirm']),
    FILTER_SANITIZE_STRING);
    $date = filter_var(trim($_POST['date']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $city = filter_var(trim($_POST['city']),
    FILTER_SANITIZE_STRING);
    
    $today=strtotime (date("Y-m-d"));
    $birthday=strtotime($date);
    
        
    $errors = [];

    if(mb_strlen($login) < 3 || mb_strlen($login) > 90) {
        $errors[] = "Недопустимая длина логина";
    }
    if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
        $errors[] =  "Недопустимая длина имени";
    }
    if(mb_strlen($pass) < 2 || mb_strlen($pass) > 10) {
        $errors[] =  "Недопустимая длина пароля (от 2 до 10 символов)";
    }
    if ($pass !== $pass_confirm){
        $errors[] = "Пароли не совпадают";
    }
    if ($birthday > $today) {
        $errors[] = "Недопустимая дата";
    }
    if(mb_strlen($email) < 3 || mb_strlen($email) > 90) {
        $errors[] =  "Недопустимая длина строки почты";
    }
    if(mb_strlen($city) < 3 || mb_strlen($city) > 90) {
        $errors[] = "Недопустимая длина строки города";
    }


    $r = $mysql->query("SELECT login FROM `users` WHERE `login` = '$login'");
    $result = $r->num_rows;
    if ($result > 0) {
    $errors[] = "Логин занят";
    }


    $r = $mysql->query("SELECT email FROM `users` WHERE `email` = '$email'");
    $result = $r->num_rows;
    if ($result > 0) {
        $errors[] =  "Почта занята";
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: /');
        exit();
    }


    $pass = md5($pass."qwerty12345");

    $mysql->query("INSERT INTO `users`(`login`,`pass`,`name`,`birthday`,`email`,`city`)
     VALUES ('$login', '$pass', '$name','$date','$email','$city')");
    $_SESSION['success_msg'] = "Вы успешно зарегестрировались";

    $_SESSION['user'] = $mysql->insert_id;


    $mysql->close();

    header('Location: ../profile.php');

?>


