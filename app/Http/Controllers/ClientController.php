<?php

namespace App\Http\Controllers;

use App\Client;
use App\City;
use App\Country;
use App\Currency;
use App\Wallet;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index', [
            'items' => Client::paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formData = [];
        $formData['cities'] = City::all();
        $formData['countries'] = Country::all();
        $formData['currencies'] = Currency::all();
        return view('client.form', $formData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->first_name = $request->get('first_name');
        $client->last_name = $request->get('last_name');
        $client->city_id = $request->get('city_id');
        $client->country_id = $request->get('country_id');
        $client->save();

        $currencyId = 1;
        if ($currencyId > 0) {
            $wallet = new Wallet();
            $wallet->title = 'Основной кошелек';
            $wallet->client_id = $client->id;
            $wallet->currency_id = $currencyId;
            $wallet->save();
        }

        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $formData = $client->toArray();
        $formData['cities'] = City::all();
        $formData['countries'] = Country::all();
        $formData['currencies'] = Currency::all();
        return view('client.form', $formData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
