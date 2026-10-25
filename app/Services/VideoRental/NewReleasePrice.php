<?php

namespace App\Services\VideoRental;

class NewReleasePrice extends Price
{
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function getCharge(int $daysRented)
    {
        return $daysRented * 3;
    }
}