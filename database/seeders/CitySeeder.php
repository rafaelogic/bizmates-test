<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
                ['name' => 'Kyoto'],
                ['name' => 'Nagoya'],
                ['name' => 'Osaka'],
                ['name' => 'Sapporo'],
                ['name' => 'Tokyo'],
                ['name' => 'Yokohama']
        ]);
    }
}
