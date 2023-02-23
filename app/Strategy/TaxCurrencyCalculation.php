<?php

namespace App\Strategy;

use App\Interfaces\TaxCalculatorInterface;

class TaxCurrencyCalculation
{
    private TaxCalculatorInterface $taxCalculator;

    /**
     * @param TaxCalculatorInterface $taxCalculator
     */
    public function __construct(TaxCalculatorInterface $taxCalculator)
    {
        $this->taxCalculatorStrategy = $taxCalculator;
    }

    /**
     * @param Currency $currency
     * @return void
     * Updates actual worth of currency after tax
     */
    public function calculateTax(Currency $currency): void
    {
        $taxes = $this->taxCalculatorStrategy->calculate($currency);

        $currency->setExchange($taxes);
    }
}
