<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insertOrIgnore([
            ['brand' => 'VW', 'model' => 'Golf GTI', 'color' => 'black', 'horsepower' => 190, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['brand' => 'VW', 'model' => 'Golf Sky', 'color' => 'white', 'horsepower' => 140, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['brand' => 'BMW', 'model' => 'i3', 'color' => 'blue', 'horsepower' => 110, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
