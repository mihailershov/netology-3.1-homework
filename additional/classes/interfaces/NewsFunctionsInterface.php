<?php

interface NewsFunctionsInterface
{
    public function getInputNewsValues($content, $title, $author);
    public function pushNewsInFile($session, $filepath = 'data/news.json');
    public function createAllNews($allNews);
}