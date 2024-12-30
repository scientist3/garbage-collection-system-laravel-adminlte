<?php

namespace Database\Seeders;

use App\Models\Dustbins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DustbinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Dustbins::insertOrIgnore([
            [
                'dustbin_code' => 'DB001',
                'dustbin_type_id' => 1,
                'houses_id' => 1,
                'geo_coordinates' => '40.712776,-74.005974',
            ],
            [
                'dustbin_code' => 'DB002',
                'dustbin_type_id' => 2,
                'houses_id' => 2,
                'geo_coordinates' => '34.052235,-118.243683',
            ],
            [
                'dustbin_code' => 'DB003',
                'dustbin_type_id' => 1,
                'houses_id' => 3,
                'geo_coordinates' => '41.878113,-87.629799',
            ],
        ]);
    }
}
