<?php

class Functions implements FunctionsInterface
{
    public function getInputNewsValues($content, $title, $author)
    {
        $content = nl2br($content);
        $date = date('d-m-Y H:i');
        $_SESSION['news'] = [
            'content' => $content,
            'date' => $date,
            'title' => $title,
            'author' => $author
        ];
    }

    public function pushNewsInFile($session, $filepath = 'data/news.json')
    {
        // Читаем json файл с новостями
        $allNews = json_decode(file_get_contents($filepath), true);

        // Количество новостей
        $numberOfNews = count($allNews);

        // Определяем основные параметры статьи
        $allNews[$numberOfNews]['title'] = $session['title'];
        $allNews[$numberOfNews]['author'] = $session['author'];
        $allNews[$numberOfNews]['content'] = $session['content'];
        $allNews[$numberOfNews]['date'] = $session['date'];

        // Записываем в файл
        $file = fopen($filepath, 'w');
        fwrite($file, json_encode($allNews));
        fclose($file);

        return json_decode(file_get_contents('data/news.json'), true);

    }

    public function createAllNews($allNews)
    {
        $objectsAllNews = [];
        foreach ($allNews as $theNews) {
            $news = new News($theNews['title'], $theNews['author'], $theNews['date'], $theNews['content']);
            array_unshift($objectsAllNews, $news);
        }
        return $objectsAllNews;
    }


    // Функции для работы с комментариями
    public function createAllComments($allComments)
    {
        $objectAllComments = [];
        foreach ($allComments as $theComment) {
            $comment = new Comment($theComment['author'], $theComment['content'], $theComment['date'], $theComment['newsID']);
            $objectAllComments[] = $comment;
        }
        return $objectAllComments;
    }

    public function pushCommentInFile($commentsArray, $commentArray, $filepath = 'data/comments.json')
    {
        $numberOfComments = count($commentsArray);
        $commentsArray[$numberOfComments] = $commentArray;
        $file = fopen($filepath, 'w');
        fwrite($file, json_encode($commentsArray));
        fclose($file);

        return json_decode(file_get_contents('data/comments.json'), true);
    }

    public function combineNewsAndComments($news, $comments)
    {
        foreach ($news as $key => $theNews) {
            foreach ($comments as $comment) {
                if ($theNews->getPart('title') == $comment->getPart('newsTitle')) {
                    $theNews->setComment($comment);
                }
            }
        }
        return $news;
    }

}