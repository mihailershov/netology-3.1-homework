<?php

// Подключаем классы
require_once 'core.php';

// Если приходит post запрос с createNews.php, то выполнить
if (!empty($_POST['createNews'])) {

    // Читаем json файл с новостями
    $allNews = json_decode(file_get_contents('data/news.json'), true);

    // Количество новостей
    $numberOfNews = count($allNews);

    // Определяем основные параметры статьи
    $allNews[$numberOfNews]['title'] = $_POST['title'];
    $allNews[$numberOfNews]['author'] = $_POST['author'];
    $allNews[$numberOfNews]['content'] = nl2br($_POST['content']);
    $allNews[$numberOfNews]['date'] = date('d-m-Y H:i');

    // Записываем в файл
    $allNews = json_encode($allNews);
    $file = fopen('data/news.json', 'w');
    fwrite($file, $allNews);
    fclose($file);

    // Перезагрузка для того, чтобы исключить повторное добавление статьи при ручной перезагрузке
    header('refresh: 0');

}

// Еще ращ декодируем json файл с уже добавленной статьей (если таковая была)
$allNews = json_decode(file_get_contents('data/news.json'), true);

// Если есть новости, выполнить
if (!empty($allNews)) {
    // Создаем объекты из новостей
    foreach ($allNews as $theNews) {
        $news = new News($theNews['title'], $theNews['author'], $theNews['date']);
        $content = $theNews['content'];
        $news->setContent($content);
        $objectsAllNews[] = $news;
    }
}

// Если отправлен post запрос создания комментария, а также если есть новости, к которым можно добавить этот комментарий, то выполнить
if (!empty($_POST['createComment']) && !empty($objectsAllNews)) {

    // Определяем параметры комментария
    $author = $_POST['commentAuthor'];
    $content = $_POST['commentContent'];
    $date = date('d-m-Y H:i');
    $newsID = $_POST['newsID'];

    // Создаем класс, используя параметры выше
    $comment = new Comment($author, $content, $date, $newsID);

    // Ищем новость, к которой нужно присвоить этот класс
    foreach ($objectsAllNews as $key => $news) {
        if ($newsID == $key) {
            $news->setComments($comment);
        }
    }
}

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

<?php if (!empty($allNews)): ?>
    <div class="wrapper">

        <!-- Выводим все новости, используя методы классов -->

        <?php foreach ($objectsAllNews as $key => $news): ?>
            <div class="news">
                <h2><?php echo $news->getAllNewsParametrs()['title']; ?></h2>
                <h4><?php echo $news->getAllNewsParametrs()['author']; ?></h4>
                <em><?php echo $news->getAllNewsParametrs()['date']; ?></em>
                <div><?php echo $news->getAllNewsParametrs()['content'] ?></div>

                <!-- Вывод комментариев, если они есть -->

                <?php if (!empty($news->getAllNewsParametrs()['comments'])): ?>
                    <?php foreach ($news->getAllNewsParametrs()['comments'] as $comment): ?>
                        <div>
                            <h1><?php echo $comment->getAllCommentParametrs()['author'] ?></h1>
                            <em><?php echo $comment->getAllCommentParametrs()['date'] ?></em>
                            <div><?php echo $comment->getAllCommentParametrs()['content'] ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form action="index.php" method="post">
                    <p>Комментировать:</p>
                    <input type="text" name="commentAuthor" placeholder="Введите имя">
                    <textarea name="commentContent" id="" cols="30" rows="5"
                              placeholder="Введите комментарий"></textarea>
                    <input type="submit" name="createComment">
                    <input type="hidden" name="newsID" value="<?php echo $key; ?>">
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Если нет новостей, то сообщить об этом -->

<?php else: ?>
    <p>Пока нет новостей</p>
<?php endif; ?>

</body>
</html>