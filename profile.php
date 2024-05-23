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
    <div class="container nav_bar">
        <div class="row">
            <div class="nav_bar">
                <div class="nav_logo"></div>
                <div class="nav_text">
                    Немного обо мне!
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Меня зовут Андрей и я всех категорически приветствую! О себе много рассказать не могу:
                    учусь, подрабатываю, весело провожу время с друзьями, дабы скрасить серую рутину. Люблю волейбол,
                    шахматы,
                    немного увлекаюсь программированием. </h1>
            </div>

            <div class="col-4">
                <div class="row my_photo">
                    <div class="row">
                        <p class="title_photo">
                            Будяков А.А.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton"> Нажми пж</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User'];?>
                </h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method = "POST" action="/profile.php" enctype="multipart/form-data" name="upload">
                        <div class="row form_reg">
                                <input class="form" type="text" name="title" placeholder="Заголовок поста">
                        </div> 
                        <div class="row form_reg">
                                <textarea name="text" cols="30" rows="10" placeholder="Введите текст..."></textarea>
                        </div> 
                        <div class="row form_reg">
                            <input type="file" name="file" style="margin-left: 500px;"/><br>
                        </div>      
                        <div class="butt">
                            <button type="submit" class="btn_reg" name="submit">
                                Сохранить пост
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>

</html>

<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', 'Risen2darkwaters', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

}



?>
