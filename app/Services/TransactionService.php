<?php

namespace App\Services;


class TransactionService implements TransactionServiceInterface
{
    protected $walletService;

    public function __construct()
    {
        $this->walletService = new \domain\WalletService;
    }

    public function doReplenish($fields)
    {
        $walletEntity = \App\Wallet::findOrFail($fields['wallet_id']);
        $currencyEntity = \App\Currency::findOrFail($fields['currency_id']);
        $amount = (float)$fields['amount'];
        $this->walletService->moneyReplenish($walletEntity, $currencyEntity, $amount);
    }

    public function doTransfer($fields)
    {
        $fromWallet = \App\Wallet::findOrFail($fields['from_wallet_id']);
        $toWallet = \App\Wallet::findOrFail($fields['to_wallet_id']);
        $currencyEntity = \App\Currency::findOrFail($fields['currency_id']);
        $amount = (float)$fields['amount'];

        \DB::transaction(function () use ($fromWallet, $toWallet, $currencyEntity, $amount) {
            $this->walletService->moneyTransfer($fromWallet, $toWallet, $currencyEntity, $amount);
        });
    }
}