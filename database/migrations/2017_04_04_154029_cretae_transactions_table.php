<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 10);
            $table->integer('related_tid');
            $table->integer('client_id');
            $table->integer('wallet_id');
            $table->integer('currency_id');
            $table->integer('amount');
            $table->timestamps();
            $table->index(['client_id', 'type', 'currency_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
