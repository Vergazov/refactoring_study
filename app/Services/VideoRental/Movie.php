<?php

namespace App\Services\VideoRental;

class Movie
{
    public const int CHILDRENS = 2;

    public const int REGULAR = 0;

    public const int NEW_RELEASE = 1;

    private string $title;

    private int $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $arg): void
    {
        $this->priceCode = $arg;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
