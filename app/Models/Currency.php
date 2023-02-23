<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CurrencyFactory;


class Currency extends Model
{
    use HasFactory;

    // Type Constants
    const AUS = 'AUD';
    const USA = 'USD';
    const UK = 'GBP';

    // Model Values
    private string $currency;
    private string $type;
    private string $date;
    private int $exchange;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CurrencyFactory::new();
    }


    /**
     * Function to save currency exchange
     * @param $currency
     * @param $type
     * @param $date
     * @return void
     */
    public function saveCurrency($currency, $type, $date) {
        $this->currency = $currency;
        $this->type = $type;
        $this->date = $date;
        $this->save();
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency): Currency
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): Currency
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return date
     * Probably doesn't work. Date doesn't exist as a php Variable type.
     */
    public function getDate(): date
    {
        return $this->date;
    }

    /**
     * @param date $date
     * @return $this
     */
    public function setDate(date $date): Currency
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getExchange(): int
    {
        return $this->exchange;
    }

    /**
     * @param exchange $exchange
     * @return $this
     */
    public function setExchange(int $exchange): Currency
    {
        $this->exchange = $exchange;
        return $this;
    }
}
