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

        $withdrawingMoney = CurrencyBrokerService::conversionCurrency($money, $walletEntity->getCurrency());

        /** Пополняем кошелек деньгами, и возвращаем результат */
        return $walletEntity->replenish($withdrawingMoney);
    }

    /**
     * Перевод денежных средств с одного кошелька на другой
     * @param WalletEntityInterface $fromWallet
     * @param WalletEntityInterface $toWallet
     * @param CurrencyEntityInterface $currencyEntity
     * @param float $amount
     * @return bool
     * @internal param int $fromWalletId
     * @internal param int $toWalletId
     * @internal param int $currencyId
     */
    public function moneyTransfer(
        WalletEntityInterface $fromWallet,
        WalletEntityInterface $toWallet,
        CurrencyEntityInterface $currencyEntity,
        $amount
    )
    {
        if ($fromWallet->getId() == $toWallet->getId()) {
            return false;
        }

        /** Создаем объект денег указанной валюты */
        $money = new \domain\Money($currencyEntity, $amount);

        $withdrawingMoney = CurrencyBrokerService::conversionCurrency($money, $fromWallet->getCurrency());
        $replenishingMoney = CurrencyBrokerService::conversionCurrency($money, $toWallet->getCurrency());

        /** Списываем средства с кошелька отправителя */
        $fromWallet->withdraw($withdrawingMoney);
        /** Пополняем кошелек получателя */
        $toWallet->replenish($replenishingMoney);

        return true;
    }
}