<?php

class Comment
{
    private $author;
    private $content;
    private $date;
    private $newsID;

    public function getAllCommentParametrs()
    {
        return [
            'author' => $this->author,
            'content' => $this->content,
            'date' => $this->date,
            'newsID' => $this->newsID
        ];
    }

    public function __construct($author, $content, $date, $newsID)
    {
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
        $this->newsID = $newsID;
    }
}