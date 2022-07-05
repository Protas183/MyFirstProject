<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}

include("config/database.php");
$user_id = $_SESSION["user"];
$result = $mysql->query("SELECT * FROM users WHERE id='$user_id'");
$user = $result->fetch_assoc();
$user['avatar'] = empty($user['avatar']) ? './assets/image/users/default.png':$user['avatar'];


$succes_msg = null;
if (isset($_SESSION['success_msg'])){
    $succes_msg = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}
?>

<?php
    require_once("./layouts/header.php");
    require_once("./layouts/nav.php");
?>

<body>
<div class="container vh-100">
    <?php if($succes_msg){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $succes_msg ?>
        </div>
    <?php }?>
    <div class="card mt-5" style="width: 18rem;">
        <img class="" src="<?php echo $user['avatar'] ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Profile</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Login:<?php echo $user["login"]?></li>
            <li class="list-group-item">Name:<?php echo $user["name"]?></li>
            <li class="list-group-item">Email:<?php echo $user["email"]?></li>
            <li class="list-group-item">Date:<?php echo $user["birthday"]?></li>
            <li class="list-group-item">City:<?php echo $user["city"]?></li>
            </ul>
    </div>
</div>

<?php
    require_once ("./layouts/footer.php");
?>

</body>
</html>



