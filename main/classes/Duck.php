<?php

class Duck
{
    // Просто попробовать
    private $isPet;

    public function setIsPetValue($value = false)
    {
        $this->isPet = $value;
    }

    public function __construct($age, $color, $sex)
    {
        $this->age = $age;
        $this->color = $color;
        $this->sex = $sex;
    }
}
