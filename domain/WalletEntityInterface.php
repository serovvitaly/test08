<?php

namespace domain;


interface WalletEntityInterface
{
    public function getCurrency();

    public function withdraw(\domain\Money $money);

    public function replenish(\domain\Money $money);

    public function getId();
}