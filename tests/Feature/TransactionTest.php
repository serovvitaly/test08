<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionTest extends TestCase
{
    public function testDoReplenish()
    {
        $this->assertTrue(true);
    }

    public function testDoReplenishJson()
    {
        $response = $this->json(
            'POST',
            '/transaction/replenish',
            [
                'wallet_id' => '1',
                'currency_id' => '1',
                'amount' => '1',
            ]
        );

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'success' => false,
            ])
        ;
    }

    public function testDoTransfer()
    {
        $this->assertTrue(true);
    }

    public function testDoTransferJson()
    {
        $this->assertTrue(true);
    }
}
