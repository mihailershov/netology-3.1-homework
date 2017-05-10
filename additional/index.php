<?php

// Подключаем классы
require_once 'core.php';

$allNews = $allComments = $objectsAllNews = $objectsAllComments = [];
if (file_exists('data/news.json')) $allNews = json_decode(file_get_contents('data/news.json'), true);
if (file_exists('data/comments.json')) $allComments = json_decode(file_get_contents('data/comments.json'), true);

// Если пришел post запрос с новостью - поместить ее в json
if (stristr($_SERVER['HTTP_REFERER'], 'createNews.php') && !empty($_SESSION['news'])) {
    $allNews = $functions->pushNewsInFile($_SESSION['news']);
    header('refresh: 0');
}


if (!empty($allNews)) {
    $objectsAllNews = $functions->createAllNews($allNews);
}


// Если отправлен post запрос создания комментария, а также если есть новости, к которым можно добавить этот комментарий, то выполнить
if (!empty($_POST['createComment']) && !empty($objectsAllNews)) {
    $commentParametrs = [
        'author' => $_POST['author'],
        'content' => $_POST['content'],
        'newsID' => $_POST['newsID']
    ];
    $allComments = $functions->pushCommentInFile($allComments, $commentParametrs);
    header('refresh: 0');
}

if (!empty($allComments)) {
    $objectsAllComments = $functions->createAllComments($allComments);
}


$objectsAllNews = $functions->combineNewsAndComments($objectsAllNews, $objectsAllComments);

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

<!-- Если есть новости, то выполнить -->

<?php if (!empty($objectsAllNews)): ?>
    <div class="wrapper">

        <!-- Выводим все новости, используя методы классов -->

        <?php foreach ($objectsAllNews as $key => $news): ?>
            <div class="news">
                <h2><?php echo $news->getTitle() ?></h2>
                <h4><?php echo $news->getAuthor() ?></h4>
                <em><?php echo $news->getDate() ?></em>
                <div><?php echo $news->getContent() ?></div>

                <!-- Вывод комментариев, если они есть -->

                <?php if (!empty($news->getComments())): ?>
                    <?php foreach ($news->getComments() as $comment): ?>
                        <div class="comment">
                            <h4><?php echo $comment->getAuthor() ?></h4>
                            <em><?php echo $comment->getDate() ?></em>
                            <div><?php echo $comment->getContent() ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form action="index.php" method="post">
                    <p>Комментировать:</p>
                    <input type="text" name="author" placeholder="Введите имя">
                    <textarea name="content" id="" cols="30" rows="5"
                              placeholder="Введите комментарий"></textarea>
                    <input type="submit" name="createComment">
                    <input type="hidden" name="newsID" value="<?php echo $news->getTitle(); ?>">
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Если нет новостей, то сообщить об этом -->

<?php else: ?>
    <p class="none-news">Пока нет новостей</p>
<?php endif; ?>

</body>
</html>