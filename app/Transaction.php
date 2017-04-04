<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function wallet()
    {
        return $this->belongsTo('App\Wallet', 'wallet_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function getType()
    {
        $types = [
            'replenish' => 'Пополнение',
            'withdraw' => 'Списание',
        ];

        return $types[$this->type];
    }
}
