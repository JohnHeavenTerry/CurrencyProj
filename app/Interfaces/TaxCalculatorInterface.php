<?php

namespace App\Interfaces;

use App\Models\Currency;

interface TaxCalculatorInterface
{
    public function calculate(Currency $currency): float;
}
