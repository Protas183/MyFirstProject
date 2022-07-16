<?php
    session_start();
    $user_auth = isset($_SESSION['user']);
    if($user_auth){
        header('Location: profile.php');
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
?>
<?php
    require_once("./layouts/header.php");
    require_once("./layouts/nav.php");
?>

<body>
    <div class="container mt-4">
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
        <div class="row">
            <div class="col">
                <h1>Форма регистрации</h1>
                <form action="validation-form/userRegistration.php" method="post">
                    <input type="text" class="form-control" name="login"
                           id="login" placeholder="Введите логин" required><br>
                    <input type="text" class="form-control" name="name"
                           id="name" placeholder="Введите имя" required><br>
                    <input type="date" class="form-control" name="date"
                           id="birthday" placeholder="Введите дату рождения" required><br>
                    <input type="text" class="form-control" name="city"
                           id="city" placeholder="Введите город" required><br>
                    <input type="email" class="form-control" name="email"
                           id="email" placeholder="Введите почту" required><br>
                    <input type="password" class="form-control" name="pass"
                           id="pass" placeholder="Введите пароль" required><br>
                    <input type="password" class="form-control" name="pass_confirm"
                           id="pass" placeholder="Подтвердите пароль" required><br>
                    <button class="btn btn-success"
                            type="submit">Зарегистрировать</button>
                </form>
            </div>
            <div class="col">
            <h1>Форма авторизации</h1>
            <form action="validation-form/userAutorization.php" method="post">
                <input type="text" class="form-control" name="login"
                       id="login" placeholder="Введите логин" required><br>
                <input type="password" class="form-control" name="pass"
                       id="pass" placeholder="Введите пароль" required><br>
                <button class="btn btn-success" type="submit">Авторизоваться</button>
            </form>
            </div>
        </div>
    </div>
<?php
    require_once ("./layouts/footer.php");
?>
</body>
</html>
