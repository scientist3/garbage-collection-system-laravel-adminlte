<?php

namespace Database\Seeders;

use App\Models\Dustbins;
use App\Models\House;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DustbinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $houses = House::all(); // Fetch all houses
        $dustbins = [];

        foreach ($houses as $house) {
            for ($i = 1; $i <= 2; $i++) {
                $dustbins[] = [
                    //'dustbin_code' => 'DB' . str_pad(($house->id - 1) * 2 + $i, 3, '0', STR_PAD_LEFT),
                    'dustbin_code' => strtoupper(preg_replace('/[^A-Z0-9]/', 'D', Str::random(20))),
                    'dustbin_type_id' => $i, // Randomly assign a dustbin type
                    'houses_id' => $house->id,
                    // 'geo_coordinates' => $this->generateRandomCoordinates(),
                ];
            }
        }

        Dustbins::insertOrIgnore($dustbins);
    }

    private function generateRandomCoordinates(): string
    {
        $lat = rand(-90 * 1000000, 90 * 1000000) / 1000000;
        $lng = rand(-180 * 1000000, 180 * 1000000) / 1000000;
        return $lat . ',' . $lng;
    }
}
