<?php

final class Comment extends TheNewsTemplate
{
    protected $newsTitle;

    public function __construct($author, $content, $date, $newsTitle)
    {
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
        $this->newsTitle = $newsTitle;
    }
}