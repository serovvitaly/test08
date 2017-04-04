<?php

namespace domain;


class CurrencyBrokerService
{
    /**
     * Сравнивает типы текущей и переданной валюты, если валюты однотипные,
     * то возвращается TRUE, в противном случае возвращается FALSE
     * @param CurrencyEntityInterface $currency1
     * @param CurrencyEntityInterface $currency2
     * @return bool
     */
    public static function compareCurrencies(CurrencyEntityInterface $currency1, CurrencyEntityInterface $currency2)
    {
        return $currency1->getShortName() === $currency2->getShortName();
    }

    /**
     * Возвращает объект Money, сконвертированный в указанную валюту
     * @param Money $money
     * @param CurrencyEntityInterface $currency
     * @return Money
     */
    public static function conversionCurrency(Money $money, CurrencyEntityInterface $currency)
    {
        if (self::compareCurrencies($money->getCurrency(), $currency)) {
            return $money;
        }

        return $money;
    }
}
