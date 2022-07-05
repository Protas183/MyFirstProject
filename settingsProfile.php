<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}
$errors = [];
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
$succes_msg = null;
if (isset($_SESSION['success_msg'])){
    $succes_msg = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}


include("config/database.php");
$user_id = $_SESSION["user"];
$result = $mysql->query("SELECT * FROM users WHERE id='$user_id'");
$user = $result->fetch_assoc();
?>
<?php
    require_once("./layouts/header.php");
    require_once("./layouts/nav.php");
?>
<body>
    <div class="container vh-100">
        <div class="w-100">
            <?php if(!empty($errors)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php
                        foreach ($errors as $error) {
                            echo "<li>$error</li>";
                        }
                        ?>
                    </ul>
                </div>
            <?php }?>
            <?php if($succes_msg){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $succes_msg ?>
                </div>
            <?php }?>
            <div class="mt-5 mx-auto" style="max-width: 50% ">
                <div class="row">
                    <div class="border border-dark rounded mb-5 p-2">
                        <h1>Выбирите новый аватар</h1>
                        <form action="validation-form/uploadUserImage.php" method="post" enctype="multipart/form-data">
                            <input class="form-control" type="file" name="avatar"><br>
                            <button class="btn btn-success"
                                    type="submit">Сохранить</button>   
                        </form>
                    </div>
                    <div class="border border-dark rounded p-2">                                         
                        <h1>Настройки пользователя</h1>                                 
                        <form action="validation-form/updateProfile.php" method="post">
                        <input type="text" class="form-control" name="login"
                               id="login" placeholder="Введите логин"
                               value="<?php echo $user["login"]?>"><br>
                        <input type="text" class="form-control" name="name"
                               id="name" placeholder="Введите имя"
                               value="<?php echo $user["name"]?>"><br>
                        <input type="date" class="form-control" name="date"
                               id="birthday" placeholder="Введите дату рождения"
                               value="<?php echo $user["birthday"]?>"><br>
                        <input type="text" class="form-control" name="city"
                               id="city" placeholder="Введите город"
                               value="<?php echo $user["city"]?>"><br>
                        <input type="email" class="form-control" name="email"
                               id="email" placeholder="Введите почту"
                               value="<?php echo $user["email"]?>"><br>
                        <button class="btn btn-success"
                                type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once ("./layouts/footer.php");
?>

</body>
</html>



