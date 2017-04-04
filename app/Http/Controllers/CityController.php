<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Services\CityServiceInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CityServiceInterface $cityService)
    {
        $countryId = (int)$request->get('country_id');

        if ($countryId > 0) {
            $items = City::where(['country_id' => $countryId])->paginate(20);
        } else {
            $items = City::paginate(20);
        }

        return view('city.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.form', [
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CityServiceInterface $cityService)
    {
        $cityService->make($request->all());
        return redirect('city');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $formData = $city->toArray();
        $formData['countries'] = Country::all();
        return view('city.form', $formData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city, CityServiceInterface $cityService)
    {
        $cityService->update($request->all());
        return redirect('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
