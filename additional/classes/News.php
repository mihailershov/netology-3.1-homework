<?php

class News
{
    private $title;
    private $date;
    private $content;
    private $author;
    private $comments = [];

    /*
    public function getAllNewsParametrs()
    {
        return [
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content,
            'author' => $this->author,
            'comments' => $this->comments
        ];
    }*/

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getComments($comments) {
        return $this->comments = $comments;
    }

    function __construct($title, $author, $date, $content)
    {
        $this->title = $title;
        $this->date = $date;
        $this->author = $author;
        $this->content = $content;
    }
}