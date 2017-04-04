<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CurrencyBrokerServiceTest extends TestCase
{
    public function testCompareCurrencies()
    {
        /** @var \App\Currency $curr1 */
        $curr1 = factory(\App\Currency::class)->make();

        /** @var \App\Currency $curr2 */
        /*$curr2 = factory(\App\Currency::class)->make([
            'code' => 'RUB',
        ]);*/

        //var_dump($curr1);

        //\domain\CurrencyBrokerService::compareCurrencies($curr1, $curr2);

        $this->assertTrue(true);
    }

    public function testConversionCurrency()
    {
        $this->assertTrue(true);
    }
}
