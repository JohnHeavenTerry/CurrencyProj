<?php

namespace App\Strategy\Currencies;

use App\Models\Currency;
use App\Service\TaxCalculatorStrategy;

class TaxFreeStrategy implements TaxCalculatorStrategy
{
    public function calculate(Currency $currency): float
    {
        return 0;
    }
}
