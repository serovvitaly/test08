<?php

namespace App;

use domain\CurrencyEntityInterface;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model implements CurrencyEntityInterface
{
    public $timestamps = false;

    public function getShortName()
    {
        return $this->code;
    }

    public function getCurrency()
    {
        // TODO: Implement getCurrency() method.
    }

    public function getId()
    {
        return $this->id;
    }
}
