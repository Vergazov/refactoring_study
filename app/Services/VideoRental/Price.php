<?php

namespace App\Services\VideoRental;

abstract class Price
{
    abstract public function getPriceCode();

    abstract public function getCharge(int $daysRented);
}