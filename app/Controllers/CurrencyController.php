<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Service\CurrencyService;

class CurrencyController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * Grabs Austrlian Dollars details
     */
    public function getAustralianDollars(Request $request) {
        $currencyService = new CurrencyService;
        $australianDollarDetails = $currencyService->getCurrencyByType(CONFIG('constants.currencies.aus'));
        return response()->json([$australianDollarDetails]);
    }
}
