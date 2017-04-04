<?php

namespace App\Services;


interface CityServiceInterface
{
    public function scopeCountry($countryId);

    public function getQuery();

    public function create($fields);

    public function update($fields);
}