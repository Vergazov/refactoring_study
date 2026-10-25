<?php

namespace App\Services\VideoRental;

use InvalidArgumentException;

class Movie
{
    public const int CHILDRENS = 2;

    public const int REGULAR = 0;

    public const int NEW_RELEASE = 1;

    private string $title;

    private int $priceCode;

    private Price $price;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getPriceCode(): int
    {
        return $this->price->getPriceCode();
    }

    public function setPriceCode(int $arg)
    {
        switch($arg){
            case(Movie::CHILDRENS):
                $this->price =  new ChildrensPrice();
            break;
            case(Movie::NEW_RELEASE):
                $this->price = new NewReleasePrice();
            break;
            case(Movie::REGULAR):
                $this->price = new RegularPrice();
            break;
            default:
                throw new InvalidArgumentException('Нет такого типа');
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCharge(int $daysRented)
    {
        return $this->price->getCharge($daysRented);
    }
}
