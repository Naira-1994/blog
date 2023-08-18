<?php
//1. Create a Price class and $price object so that:
//$price = new Price(10, “euro”);
//echo $price; // should print “The price is 10 euros”
//$price = new Price(1, “dollar”);
//echo $price; // should print “The price is 1 dollar”

class Price
{
    private $amount;
    private $currency;

    public function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function __toString() {
        return "The price is {$this->amount} {$this->currency}";
    }
}

$price1 = new Price(10, "euro");
echo $price1;

$price2 = new Price(1, "dollar");
echo $price2;

