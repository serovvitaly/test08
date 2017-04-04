<?php

namespace domain;

/**
 *
 */
class WalletService
{
    /**
     * Зачисление денежных средств на кошелек клиента
     * @param WalletEntityInterface $walletEntity
     * @param CurrencyEntityInterface $currencyEntity
     * @param float $amount
     * @return bool
     * @throws \Exception
     */
    public function moneyReplenish(
        WalletEntityInterface $walletEntity,
        CurrencyEntityInterface $currencyEntity,
        $amount
    )
    {
        /** Создаем объект денег указанной валюты */
        $money = new \domain\Money($currencyEntity, $amount);

        /** Пополняем кошелек деньгами, и возвращаем результат */
        return $walletEntity->replenish($money);
    }

    /**
     * Перевод денежных средств с одного кошелька на другой
     * @param int $fromWalletId
     * @param int $toWalletId
     * @param int $currencyId
     * @param float $amount
     * @return bool
     * @throws \Exception
     */
    public function moneyTransfer(
        WalletEntityInterface $fromWallet,
        WalletEntityInterface $toWallet,
        CurrencyEntityInterface $currencyEntity,
        $amount
    )
    {
        /** Создаем объект денег указанной валюты */
        $money = new \domain\Money($currencyEntity, $amount);

        $withdrawingMoney = CurrencyBrokerService::conversionCurrency($money, $fromWallet->getCurrency());
        $replenishingMoney = CurrencyBrokerService::conversionCurrency($money, $toWallet->getCurrency());

        /**
         * Производим списание с одного кошелька и зачисление на другой внутри транзакции
         */
        $transactionStatus = CurrencyBrokerService::transaction(
            function () use ($fromWallet, $withdrawingMoney, $toWallet, $replenishingMoney) {
                /** Списываем средства с кошелька отправителя */
                $fromWallet->withdraw($withdrawingMoney);
                /** Пополняем кошелек получателя */
                $toWallet->replenish($replenishingMoney);
            }
        );

        return $transactionStatus;
    }
}