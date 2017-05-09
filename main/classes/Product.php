<?php

class Product
{
    private $price;
    public $discount = 10;

    public function getPrice()
    {
        return $this->price * (1 - ($this->discount / 100));
    }

    public function __construct($name, $price)
    {
        $this->price = $price;
        $this->name = $name;
    }
}