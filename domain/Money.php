<?php

namespace domain;


class Money
{
    protected $amount;
    protected $currency;

    public function __construct(CurrencyEntityInterface $currency, $amount)
    {
        $this->amount = (float) $amount;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
