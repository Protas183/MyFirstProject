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
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="main.css">
</head>
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
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
