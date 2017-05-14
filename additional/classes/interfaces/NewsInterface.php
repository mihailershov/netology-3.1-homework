<?php

interface NewsInterface
{
    function __construct($title, $author, $date, $content);
    public function setComment($comment);
}