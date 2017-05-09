<?php

require_once 'core.php';

if (!empty($_POST['createNews'])) {
    $functions->getNewsParametrsAndSend($_POST['title'], $_POST['author'], $_POST['content'], 'index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить новость</title>
    <link rel="stylesheet" href="style/createNews.css">
</head>
<body>
<form method="POST">
    <div class="wrapper">
        <a href="index.php">Назад</a>
        <div class="createNews">
            <input type="text" name="title" placeholder="Введите название статьи">
            <input type="text" name="author" placeholder="Введите ваше имя и фамилию" value="М.И.Ершов">
            <label>Статья <br><textarea name="content" cols="30" rows="10"></textarea></label>
            <input type="submit" name="createNews" value="Создать статью">
        </div>
    </div>
</form>
</body>
</html>