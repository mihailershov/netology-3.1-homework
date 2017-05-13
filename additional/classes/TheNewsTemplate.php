<?php

class TheNewsTemplate
{
    protected $author;
    protected $content;
    protected $date;

    public function getPart($part)
    {
        return $this->$part;
    }
}