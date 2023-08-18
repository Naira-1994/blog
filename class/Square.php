<?php

class Square extends Rectangle
{
    public function __construct($side) {
        $this->height = $side;
        $this->width =$side;
    }
}
$sq = new Square(6);
echo $sq->area();