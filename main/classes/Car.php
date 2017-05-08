<?php

class Car
{
    const WHEELS = 4;
    // Есть ли бензобак
    const HAS_GAS_TANK = true;

    // Glossy - глянцевый или Matt - матовый
    private $typeOfColor = 'Glossy';
    public $clearance;

    // Цена цвета машины
    public function priceOfColor($typeOfColor)
    {
        if ($typeOfColor == 'Glossy') {
            return $this->colorPrice;
        }
        if ($typeOfColor == 'Matt') {
            return $this->colorPrice + 20000;
        }
        return 0;
    }

    public function priceWithAdditions($leatherInterior = false)
    {
        if ($leatherInterior) {
            // 150000 - цена кожаного салона
            return $this->price + 150000 + $this->priceOfColor($this->typeOfColor);
        }
        if (!$leatherInterior) {
            return $this->price + $this->priceOfColor($this->typeOfColor);
        }
        return $this->price;
    }

    public function __construct($model, $price, $color, $colorPrice)
    {
        $this->model = $model;
        $this->price = $price;
        $this->color = $color;
        $this->colorPrice = $colorPrice;
    }
}