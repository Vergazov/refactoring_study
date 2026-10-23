<?php

namespace App\Services\VideoRental;

class Customer
{
    private string $name;

    private array $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $arg): void
    {
        $this->rentals[] = $arg;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = 'Учет аренды для '.$this->getName()."\n";

        foreach ($this->rentals as $each) {
            $thisAmount = 0;

            // определить сумму для каждой строки
            switch ($each->getMovie()->getPriceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($each->getDaysRented() > 2) {
                        $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $each->getDaysRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($each->getDaysRented() > 3) {
                        $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            // добавить очки для активного арендатора
            $frequentRenterPoints++;
            // бонус за аренду новинки на два дня
            if ($each->getMovie()->getPriceCode() === Movie::NEW_RELEASE && $each->getDaysRented() > 1) {
                $frequentRenterPoints++;
            }

            // показать результаты для этой аренды
            $result .= "\t".$each->getMovie()->getTitle()."\t".$thisAmount."\n";
            $totalAmount += $thisAmount;
        }

        // добавить нижний колонтитул
        $result .= 'Сумма задолженности составляет '.$totalAmount."\n";
        $result .= 'Вы заработали '.$frequentRenterPoints.' очков за активность';

        return $result;
    }
}
