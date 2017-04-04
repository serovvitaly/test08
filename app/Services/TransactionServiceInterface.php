<?php

namespace App\Services;


interface TransactionServiceInterface
{
    public function doReplenish($fields);

    public function doTransfer($fields);
}