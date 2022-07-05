<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}

include ("../config/database.php");

$errors=[];

$file = $_FILES['avatar'];
$allow_upload = can_upload($file);
if($allow_upload === true){
	$user_id = $_SESSION["user"];
	$path = make_upload($file, $user_id);
	$query = "UPDATE `users` SET `avatar`='$path' WHERE `id`='$user_id'";
	$mysql->query ($query);
	$mysql->close();
	$_SESSION['success_msg'] = "Вы успешно обновили аватар";
} else {
	$errors[] = $allow_upload;
	$_SESSION['errors'] = $errors;
}

header('Location: ../settingsProfile.php');


function can_upload($file){
	if($file['name'] == '')
		return 'Не выбран файл';
	if($file['size'] == 0)
		return 'Файл слишком большой';
	$getMime = explode('.',$file['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg','png','gif','bmp','jpeg');

	if(!in_array($mime, $types))
		return 'Недопустимый тип файла';
	return true;
}

function make_upload($file, $user_id){	
		
	$name = "user_$user_id.png";
	$path_avatar = '../assets/image/users/' . $name;
	copy($file['tmp_name'], $path_avatar);
	
	return $path_avatar;
}


