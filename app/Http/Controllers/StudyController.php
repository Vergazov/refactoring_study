<?php

namespace App\Http\Controllers;

use App\Services\VideoRental\Customer;
use App\Services\VideoRental\Movie;
use App\Services\VideoRental\Rental;
use App\Services\GetXmlForSigh\Patient;
use App\Services\GetXmlForSigh\Service;
use App\Services\GetXmlForSigh\ServiceProvider;

class StudyController extends Controller
{
    public function index()
    {
        $customer = new Customer('Иван');
        $customer->addRental(new Rental(new Movie('Матрица', Movie::NEW_RELEASE), 3));
        $customer->addRental(new Rental(new Movie('Люди Икс', Movie::REGULAR), 3));
        $customer->addRental(new Rental(new Movie('Три кота', Movie::CHILDRENS), 5));

        return $customer->statement();
    }
}
