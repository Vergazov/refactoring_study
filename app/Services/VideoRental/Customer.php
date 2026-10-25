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
        $result = 'Учет аренды для '.$this->getName()."\n";

        foreach ($this->rentals as $each) {
            // показать результаты для этой аренды
            $result .= "\t".$each->getMovie()->getTitle()."\t".$each->getCharge()."\n";
        }

        // добавить нижний колонтитул
        $result .= 'Сумма задолженности составляет '.$this->getTotalAmount()."\n";
        $result .= 'Вы заработали '.$this->getTotalFrequentRenterPoints().' очков за активность';

        return $result;
    }

    private function getTotalAmount()
    {
        $totalAmount = 0;
        foreach($this->rentals as $rental){
            $totalAmount += $rental->getCharge();
        }
        return $totalAmount;
    }

    private function getTotalFrequentRenterPoints()
    {
        $totalFrequentRenterPoints = 0;
        foreach($this->rentals as $rental){
            $totalFrequentRenterPoints += $rental->getFrequentRenterPoints();
        }
        return $totalFrequentRenterPoints;
    }

}
