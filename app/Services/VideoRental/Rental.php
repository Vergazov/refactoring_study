<?php

namespace App\Services\VideoRental;

class Rental
{
    private Movie $movie;

    private int $daysRented;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getCharge()
    {
        return $this->getMovie()->getCharge($this->getDaysRented());
    }

     public function getFrequentRenterPoints()
    {
        $frequentRenterPoints = 0;
        // добавить очки для активного арендатора
        $frequentRenterPoints++;
        // бонус за аренду новинки на два дня
        if ($this->getMovie()->getPriceCode() === Movie::NEW_RELEASE && $this->getDaysRented() > 1) {
            $frequentRenterPoints++;
        }

        return $frequentRenterPoints;
    }
}
