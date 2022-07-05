<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}
include ("../config/database.php");
$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
$date = filter_var(trim($_POST['date']),
    FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
$city = filter_var(trim($_POST['city']),
    FILTER_SANITIZE_STRING);

$today=strtotime (date("Y-m-d"));
$birthday=strtotime($date);

 
$errors=[];

$user_id = $_SESSION["user"];



if(mb_strlen($login) < 3 || mb_strlen($login) > 90) {
    $errors[] = "Недопустимая длина логина";
}
if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    $errors[] =  "Недопустимая длина имени";
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

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ../settingsProfile.php');
    exit();
}

$query = "UPDATE `users` SET `login` = '$login',`email` = '$email',`city` = '$city',`name` = '$name',`birthday` = '$date' WHERE `id` = '$user_id'";
$mysql->query ($query);

$_SESSION['success_msg'] = "Данные успешно обновленны";
$mysql->close();

header('Location: ../settingsProfile.php');



?>





