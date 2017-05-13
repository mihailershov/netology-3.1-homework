<?php

final class News extends TheNewsTemplate
{
    protected $title;
    protected $comments = [];

    public function setComment($comment) {
        return $this->comments[] = $comment;
    }

    function __construct($title, $author, $date, $content)
    {
        $this->title = $title;
        $this->date = $date;
        $this->author = $author;
        $this->content = $content;
    }
}