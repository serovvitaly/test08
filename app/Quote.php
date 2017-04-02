<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function fromCurrency()
    {
        return $this->belongsTo('App\Currency', 'from_currency_id', 'id');
    }

    public function toCurrency()
    {
        return $this->belongsTo('App\Currency', 'to_currency_id', 'id');
    }
}
