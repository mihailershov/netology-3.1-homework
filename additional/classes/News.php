<?php

class News
{
    private $title;
    private $date;
    private $content;
    private $author;
    private $comments = [];

    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getComments()
    {
        return $this->comments;
    }


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