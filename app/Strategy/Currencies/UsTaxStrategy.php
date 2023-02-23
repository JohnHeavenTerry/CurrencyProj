<?php

namespace App\Strategy\Currencies;

use App\Models\Currency;
use App\Interfaces\TaxCalculatorInterface;

class UsTaxStrategy implements TaxCalculatorStrategy
{
    const TAX_RATE = 30.0;

    public function calculate(Currency $currency): float
    {
        return $currency->getExchange() * (self::TAX_RATE / 100);
    }
}
