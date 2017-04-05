<?php

namespace App\Services;


interface TransactionServiceInterface
{
    public function doReplenish($fields);

    public function doTransfer($fields);

    public function getWalletTransactions($walletId, \DateTime $fromDate = null, \DateTime $toDate = null);
}