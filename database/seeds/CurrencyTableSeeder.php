<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $samplesArr = [
            ['title' => 'Российский рубль', 'code' => 'RUB'],
            ['title' => 'Доллар США', 'code' => 'USD'],
            ['title' => 'Евро', 'code' => 'EUR'],
        ];

        foreach ($samplesArr as $sample) {
            DB::table('currencies')->insert([
                'title' => $sample['title'],
                'code' => $sample['code'],
            ]);
        }
    }
}
