<?php

class Pen
{
    public $color;
    public $inkColor;
    public $priceInRubles;

    public function isSuitableForEGE()
    {
        return $this->inkColor == 'black' || $this->inkColor == 'dark-blue';
    }
}
