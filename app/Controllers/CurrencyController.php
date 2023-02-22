<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CurrencyController
{
    private $currencyUrl = 'http://www.floatrates.com/daily/gbp.xml';

    /**
     * @return \Illuminate\Http\JsonResponse
     * Grabs Austrlian Dollars details
     * in comparison to UK pound
     */
    public function getAustralianDollars(Request $request) {
        // Could perhaps update this function to just 'GetCurrency' and pass in type to shorten code?
//        $validated = $request->validate([
//            'type' => 'required|string|max:255',
//        ]);

        //Grab XML Sheet from Endpoint
        try {
            $xml = simplexml_load_file($this->currencyUrl);
        } catch (Exception $error) {
            print_r($error);
        }

        // Loop through all currencies until you find Australian Dollar
        foreach($xml->item as $item) {
            if($item->targetCurrency == 'AUD') {
                $australianDollarArray = $item;
            }
        }

        // Save In Database Updated Currencies amount.
        Currency::saveCurrency($australianDollarArray->currency, $australianDollarArray->type, $australianDollarArray->date);

        // return response packaged up as json with status code.
        return response()->json([$australianDollarArray], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Grabs American Dollars details
     * in comparison to UK pound
     */
    public function getAmericanDollars(Request $request) {
        //Grab XML Sheet from Endpoint
        $xml = simplexml_load_file($this->currencyUrl);

        // Loop through all currencies until you find American Dollar
        foreach($xml->item as $item) {
            if($item->targetCurrency == 'USD') {
                $americanDollarJson = json_encode($item);
            }
        }

        return response()->json([$americanDollarJson], 200);
    }
}
