<?php

namespace App\Service;
use App\Models\Currency;

class CurrencyService
{

//    public function getTaxedCurrency($type) {
//        $currency = new Currency;
//        $currency->setType('Australian Dollar')
//            ->setCurrency('United Kingdom Pound')
//            ->setDate('2023-02-22');
//
//        switch ($currency->type()) {
//            case 'Austrlian Dollar':
//                $strategy = new AusTaxStrategy;
//                break;
//            case 'United States Dollar':
//                $strategy = new UsTaxStrategy;
//                break;
//            case 'United Kingdom Pound':
//                $strategy = new UkTaxStrategy;
//                break;
//            default:
//                throw new \Exception('Strategy not found for this category.');
//        }
//    }
//}
//
//interface TaxCalculatorStrategy
//{
//    public function calculate(Currency $currency): float;
//}
//
//class UsTaxStrategy implements TaxCalculatorStrategy
//{
//    const TAX_RATE = 30.0;
//
//    public function calculate(Currency $currency): float
//    {
//        return $currency->getExchange() * (self::TAX_RATE / 100);
//    }
//}
//
//class UkTaxStrategy implements TaxCalculatorStrategy
//{
//    const TAX_RATE = 40.0;
//
//    public function calculate(Currency $currency): float
//    {
//        return $currency->getExchange() * (self::TAX_RATE / 100);
//    }
//}
//
//class AusTaxStrategy implements TaxCalculatorStrategy
//{
//    const TAX_RATE = 40.0;
//
//    public function calculate(Currency $currency): float
//    {
//        return $currency->getExchange() * (self::TAX_RATE / 100);
//    }
//}
//
//
//class TaxFreeStrategy implements TaxCalculatorStrategy
//{
//    public function calculate(Currency $currency): float
//    {
//        return 0;
//    }
}


/** OR? */


/**
 * Strategy implementation for using multiple classes for interface.
 */
interface OutputInterface
{
    public function load();
}

/*
 * Serialise output of the array
 */
class SerializedArrayOutput implements OutputInterface
{
    public function load($arrayOfData = []) {
        return serialize($arrayOfData);
    }
}

/*
 * convert to json
 */
class JsonStringOutput implements OutputInterface
{
    public function load($arrayOfData = []) {
        return json_encode($arrayOfData);
    }
}

/*
 * return array output.
 */
class ArrayOutput implements OutputInterface
{
    public function load($arrayOfData = []) {
        return $arrayOfData;
    }
}
