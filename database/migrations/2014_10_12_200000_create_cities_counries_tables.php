<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesCounriesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code');
        });

        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_currency_id');
            $table->integer('to_currency_id');
            $table->float('rate');
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('currencies');
        Schema::drop('quotes');
        Schema::drop('cities');
        Schema::drop('countries');
    }
}
