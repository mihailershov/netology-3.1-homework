<?php

abstract class TheNewsTemplate implements TheNewsTemplateInterface
{
    protected $author;
    protected $content;
    protected $date;

    public function getPart($part)
    {
        return $this->$part;
    }
}