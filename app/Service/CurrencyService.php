<?php

namespace App\Service;

use App\Models\Currency;
use App\Stategy\ {
    TaxCurrencyCalculation,
    Currencies\AuTaxStrategy,
    Currencies\UkTaxStrategy,
    Currencies\UsTaxStrategy
};

class CurrencyService
{
    private $currencyUrl = 'http://www.floatrates.com/daily/gbp.xml';

    /**
     * @param $type
     * @return $currencyArray
     * @return \Exception|false|Exception|\SimpleXMLElement|null
     */
    public function getCurrencyByType($type) {
        try {
            //Grab XML Sheet from Endpoint
            $xml = simplexml_load_file($this->currencyUrl);

            // Loop through all currencies until you find desired currency
            foreach($xml->item as $currency) {
                if($currency->targetCurrency == $type) {
                    $currencyDetails = $currency;
                    break;
                }
            }

            // Save In Database Updated Currencies amount.
            Currency::create([
                'currency' => $currencyDetails->currency,
                'type' => $currencyDetails->type,
                'date' =>$currencyDetails->date
            ]);

            // return response packaged up as json with status code.
            return $currencyDetails;
        } catch (\Exception $error) {
            return $error;
        }
    }

    /**
     * @param Currency $currency
     * @return \App\Models\Currency\exchange|int
     * @throws \Exception
     * Loops through different types
     * calculates tax dependent on currency
     */
    public function setTaxedCurrency(Currency $currency) {
        switch ($currency->getType()) {
            case Currency::AUS:
                $strategy = new AuTaxStrategy;
                break;
            case Currency::USA:
                $strategy = new UsTaxStrategy;
                break;
            case Currency::UK:
                $strategy = new UkTaxStrategy;
                break;
            default:
                throw new \Exception('Strategy not found for this currency.');
        }

        $taxCurrencyCalculation = new TaxCurrencyCalculation($strategy);
        $taxCurrencyCalculation->calculateTax();

        return $currency->getExchange();
    }
}
