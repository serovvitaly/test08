<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model implements \domain\WalletEntityInterface
{
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getId()
    {
        return $this->id;
    }

    public function withdraw(\domain\Money $money)
    {
        $transaction = new \App\Transaction;
        $transaction->type = 'withdraw';
        $transaction->related_tid = 0;
        $transaction->client_id = $this->client->id;
        $transaction->wallet_id = $this->id;
        $transaction->currency_id = $money->getCurrency()->getId();
        $transaction->amount = $money->getAmount();
        $transaction->save();
        return $transaction;
    }

    public function replenish(\domain\Money $money)
    {
        $transaction = new \App\Transaction;
        $transaction->type = 'replenish';
        $transaction->related_tid = 0;
        $transaction->client_id = $this->client->id;
        $transaction->wallet_id = $this->id;
        $transaction->currency_id = $money->getCurrency()->getId();
        $transaction->amount = $money->getAmount();
        $transaction->save();
        return $transaction;
    }
}
