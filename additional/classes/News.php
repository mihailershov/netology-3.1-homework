<?php

class News
{
    private $title;
    private $date;
    private $content;
    private $author;
    private $comments;

    public function getAllNewsParametrs()
    {
        return [
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content,
            'author' => $this->author,
            'comments' => $this->comments
        ];
    }

    public function setContent($content)
    {
        return $this->content = $content;
    }

    public function setComments($comment) {
        return $this->comments[] = $comment;
    }

    function __construct($title, $author, $date)
    {
        $this->title = $title;
        $this->date = $date;
        $this->author = $author;
    }
}