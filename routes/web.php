<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/currency/australian-dollars', [\App\Controllers\CurrencyController::class, 'getAustralianDollars']);


