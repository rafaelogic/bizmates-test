<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::insert([
            ['category_id' => 1, 'code' => 10021, 'name' => 'Karaoke Box'],
            ['category_id' => 1, 'code' => 10033, 'name' => 'Pachinko Parlor'],
            ['category_id' => 2, 'code' => 13101, 'name' => 'Beijing Restaurant'],
            ['category_id' => 2, 'code' => 13125, 'name' => 'Shanghai Restaurant'],
            ['category_id' => 2, 'code' => 13128, 'name' => 'Taiwanese Restaurant'],
            ['category_id' => 2, 'code' => 13196, 'name' => 'Hotpot Restaurant'],
            ['category_id' => 2, 'code' => 13264, 'name' => 'Donburi Restaurant'],
            ['category_id' => 2, 'code' => 13266, 'name' => 'Japanese Family Restaurant'],
            ['category_id' => 2, 'code' => 13267, 'name' => 'Kaiseki Restaurant'],
            ['category_id' => 2, 'code' => 13268, 'name' => 'Kushikatsu Restaurant'],
        ]);
    }
}
