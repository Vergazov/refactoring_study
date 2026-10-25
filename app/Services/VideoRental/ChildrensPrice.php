<?php

namespace App\Services\VideoRental;

class ChildrensPrice extends Price
{
    public function getPriceCode()
    {
        return Movie::CHILDRENS;
    }

    public function getCharge(int $daysRented)
    {
        $thisAmount = 0;
        $thisAmount += 1.5;

        if ($daysRented > 3) {
            $thisAmount += ($daysRented - 3) * 1.5;
        }

        return $thisAmount;
    }
}