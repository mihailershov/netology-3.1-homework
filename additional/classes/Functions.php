<?php


class Functions
{
    public function getNewsParametrsAndSend($title, $author, $content, $location)
    {
        $content = nl2br($content);
        $date = date('d-m-Y H:i');
        $_SESSION['news'] = [
            'content' => $content,
            'date' => $date,
            'title' => $title,
            'author' => $author
        ];
        header("Location: $location");
    }

    public function getNewsAndPutIntoTheFile($session, $filePath = 'data/news.json')
    {
        if (stristr($_SERVER['HTTP_REFERER'], 'createNews.php') && !empty($session)) {

            $numberOfNews = (!empty($allNews)) ? count($allNews) : 0;

            $jsonNews[$numberOfNews]['title'] = $session['title'];
            $jsonNews[$numberOfNews]['date'] = $session['date'];
            $jsonNews[$numberOfNews]['author'] = $session['author'];
            $jsonNews[$numberOfNews]['content'] = $session['content'];

            $file = fopen($filePath, 'w');
            fwrite($file, json_encode($jsonNews));
            fclose($file);
        }
    }

    public function createNewsClassFromJsonParametrs($json)
    {
        if (!empty($json)) {
            foreach ($json as $theNews) {
                $news = new News($theNews['title'], $theNews['author'], $theNews['date'], $theNews['content']);
                $allNews = [];
                array_unshift($allNews, $news);
            }
        }
        return $allNews;
    }
}