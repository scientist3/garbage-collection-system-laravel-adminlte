<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DataProviders\DistrictDataProvider;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districtData = DistrictDataProvider::data();

        // Chunk the district data and insert in batches
        $chunkSize = 1000; // Adjust this value as needed
        foreach (array_chunk($districtData, $chunkSize) as $chunkDistricts) {
            District::insertOrIgnore($chunkDistricts);
        }
    }
}
