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
   <link rel="stylesheet" href="css">
</head>
<body>
    <div class="container mt-4"
    <?php
    if($_COOKIE['usre'] == ''):
    ?>

        <div class="row">
            <div class="col">
            <h1>Форма регистрации</h1>
            <form action="validation-form/check.php" method="post">
                <input type="text" class="form-control" name="login"
                       id="login" placeholder="Введите логин"><br>
                <input type="text" class="form-control" name="name"
                       id="name" placeholder="Введите имя"><br>
                <input type="password" class="form-control" name="pass"
                       id="pass" placeholder="Введите пароль"><br>
                <button class="btn btn-success"
                        type="submit">Зарегистрировать</button>
            </form>
            </div>
            <div class="col">
                <h1>Форма авторизации</h1>
                <form action="validation-form/auth.php" method="post">
                    <input type="text" class="form-control" name="login"
                           id="login" placeholder="Введите логин"><br>
                    <input type="password" class="form-control" name="pass"
                           id="pass" placeholder="Введите пароль"><br>
                    <button class="btn btn-success" type="submit">Авторизоваться</button>
                </form>
            </div>
        </div>
    </div>
    <?php else: ?>
        <p> Hi <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a
            href="/exit.php" >здесь< /a>.</p>
    <?php endif; ?>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
