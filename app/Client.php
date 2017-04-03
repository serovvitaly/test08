<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function full_name()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
}
