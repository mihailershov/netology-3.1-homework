<?php

class Comment
{
    private $author;
    private $content;
    private $date;

    /*
    public function getAllCommentParametrs()
    {
        return [
            'author' => $this->author,
            'content' => $this->content,
            'date' => $this->date
        ];
    }*/

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


    public function __construct($author, $content, $date, $newsID)
    {
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
        $this->newsID = $newsID;
    }
}