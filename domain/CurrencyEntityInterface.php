<?php

namespace domain;


interface CurrencyEntityInterface
{
    public function getShortName();

    public function getCurrency();

    public function getId();
}