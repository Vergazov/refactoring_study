<?php

namespace App\Services\VideoRental;

class RegularPrice extends Price
{
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }

    public function getCharge(int $daysRented)
    {
        $thisAmount = 0;
        $thisAmount += 2;
        if ($daysRented > 2) {
            $thisAmount += ($daysRented - 2) * 1.5;
        }

        return $thisAmount;
    }
}