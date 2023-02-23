<?php

namespace App\Strategy\Currencies;

use App\Models\Currency;
use App\Interfaces\TaxCalculatorInterface;

class UkTaxStrategy implements TaxCalculatorStrategy
{
    const TAX_RATE = 40.0;

    /**
     * Returns UK Tax Rate
     * @param Currency $currency
     * @return float
     */
    public function calculate(Currency $currency): float
    {
        return $currency->getExchange() * (self::TAX_RATE / 100);
    }
}
