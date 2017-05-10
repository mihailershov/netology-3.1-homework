<?php

class Comment
{
    private $author;
    private $content;
    private $date;
    private $newsTitle;

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

    public function getNewsTitle()
    {
        return $this->newsTitle;
    }

    public function __construct($author, $content, $date, $newsTitle)
    {
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
        $this->newsTitle = $newsTitle;
    }
}