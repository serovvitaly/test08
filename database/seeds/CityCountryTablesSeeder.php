<?php

use Illuminate\Database\Seeder;

class CityCountryTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $samplesArr = [
            ['title' => 'Россия', 'cities' => [
                ['title' => 'Москва'],
                ['title' => 'Санкт-Петербург'],
                ['title' => 'Екатеринбург'],
            ]],
            ['title' => 'США', 'cities' => [
                ['title' => 'Вашингтон'],
                ['title' => 'Нью-Йорк'],
            ]],
        ];

        foreach ($samplesArr as $sample) {
            $countryId = DB::table('countries')->insertGetId([
                'title' => $sample['title'],
            ]);
            foreach ($sample['cities'] as $city) {
                DB::table('cities')->insert([
                    'title' => $city['title'],
                    'country_id' => $countryId,
                ]);
            }
        }
    }
}
