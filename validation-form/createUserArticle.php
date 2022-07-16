<?php 
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
	header('Location: /');
}
?>

<?php
include("../config/db-card.php");
?>





