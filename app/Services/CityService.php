<?php

namespace App\Services;


use Illuminate\Support\Facades\Validator;

class CityService implements CityServiceInterface
{
    protected $query;

    public function create($fields)
    {
        $validator = Validator::make($fields, [
            'title' => 'required|max:255',
            'country_id' => 'integer',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->messages());
        }

        $city = new \App\City();
        $city->title = $fields['title'];
        $city->country_id = $fields['country_id'];
        $city->save();
        return $city;
    }

    public function update($fields)
    {
        // TODO: Implement update() method.
    }

    public function scopeCountry($countryId)
    {
        return $this;
    }

    public function getQuery()
    {
        return $this;
    }
}