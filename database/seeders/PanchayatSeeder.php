<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DataProviders\PanchayatDataProvider;
use App\Models\Panchayat;

class PanchayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panchayatData = PanchayatDataProvider::data();

        // Chunk the panchayat data and insert in batches
        $chunkSize = 1000; // Adjust this value as needed
        foreach (array_chunk($panchayatData, $chunkSize) as $chunkPanchayats) {
            Panchayat::insertOrIgnore($chunkPanchayats);
        }
    }
}
