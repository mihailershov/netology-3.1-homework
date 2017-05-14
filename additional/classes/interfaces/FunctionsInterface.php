<?php

interface FunctionsInterface
{
    public function getInputNewsValues($content, $title, $author);
    public function pushNewsInFile($session, $filepath = 'data/news.json');
    public function createAllNews($allNews);

    public function createAllComments($allComments);
    public function pushCommentInFile($commentsArray, $commentArray, $filepath = 'data/comments.json');
    public function combineNewsAndComments($news, $comments);
}