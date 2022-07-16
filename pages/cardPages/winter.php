<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}
?>

<?php
    require_once("../../layouts/header.php");
    require_once("../../layouts/nav.php");
?>



