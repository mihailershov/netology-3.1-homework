<?php

interface CommentFunctionsInterface
{
    public function createAllComments($allComments);
    public function pushCommentInFile($commentsArray, $commentArray, $filepath = 'data/comments.json');
    public function combineNewsAndComments($news, $comments);
}