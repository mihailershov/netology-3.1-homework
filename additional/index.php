<?php

// Подключаем классы
require_once 'core.php';

$functions->getNewsAndPutIntoTheFile($_SESSION['news']);

$jsonNews = json_decode(file_get_contents('data/news.json'), true);
$allNews = $functions->createNewsClassFromJsonParametrs($jsonNews);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/index.css">
    <title>Новости</title>
</head>
<body>
<a href="createNews.php">Добавить новость</a>
<h1>Новости</h1>
<?php if (!empty($allNews)): ?>
    <div class="wrapper">

        <?php foreach ($allNews as $theNews): ?>
            <div class="news">
                <h2><?php echo $theNews->getTitle() ?></h2>
                <h4><?php echo $theNews->getAuthor() ?></h4>
                <em><?php echo $theNews->getDate() ?></em>
                <div><?php echo $theNews->getContent() ?></div>
            </div>
        <?php endforeach; ?>

    </div>
<?php else: ?>
    <p>Новостей пока нет</p>
<?php endif; ?>
</body>
</html>