<?php

class TV
{

    const REMOTE_CONTROLLER = true;
    public $isHasOS;

    public function diagonalSize()
    {
        return round(($this->width^2 + $this->height^2)^0.5, 2);
    }

    public function __construct($model, $price, $widthInMeters, $heightInMeters)
    {
        $this->model = $model;
        $this->price = $price;
        $this->width = $widthInMeters;
        $this->height = $heightInMeters;
    }
}
