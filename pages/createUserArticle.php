<?php 
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
	header('Location: /');
}
include("../config/db-card.php");
    $title = filter_var(trim($_POST['title']),
    FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST['description']),
    FILTER_SANITIZE_STRING);
    $date = filter_var(trim($_POST['date']),
    FILTER_SANITIZE_STRING);
    $img = filter_var(trim($_FILES['img']),
    FILTER_SANITIZE_STRING);

    

$mysql->query("INSERT INTO cardarticles (`title`,`description`,`img`,`date`)
     VALUES ('$title', '$description', '$img', '$date')");
$mysql->close();


header('Location: ./home.php');
?>