<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Будяков А.А.</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="reg">
                <h1>Регистрация</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method = "POST" action="/registration.php">
                <div class="row form_reg">
                    <input class="form" type="email" name="email" placeholder="Email">
                </div>
                <div class="row form_reg">
                    <input class="form" type="text" name="login" placeholder="Login">
                </div>
                <div class="row form_reg">
                    <input class="form" type="password" name="password" placeholder="Password">
                </div>
                <div class="butt">
                    <button type="submit" class="btn_reg" name="submit">
                        Продолжить
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php

    require_once('db.php');
    $link = mysqli_connect('127.0.0.1', 'root', 'Risen2darkwaters', 'first');

    if (isset($_COOKIE['User'])) {
        header("Location: login.php");
    }

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $username = $_POST['login'];
        $pass = $_POST['password'];

        if (!$email || !$username || !$pass) die ('Пожалуйста введите все значения!');

        $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$pass')";

        if(!mysqli_query($link, $sql)) {
            echo "Не удалось добавить пользователя";
        }
    }
?> 