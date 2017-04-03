<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }
}
