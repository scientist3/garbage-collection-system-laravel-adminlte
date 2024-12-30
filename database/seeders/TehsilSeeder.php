<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DataProviders\TehsilDataProvider;
use App\Models\Tehsil;

class TehsilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tehsilData = TehsilDataProvider::data();

        // Chunk the tehsil data and insert in batches
        $chunkSize = 1000; // Adjust this value as needed
        foreach (array_chunk($tehsilData, $chunkSize) as $chunkTehsils) {
            Tehsil::insertOrIgnore($chunkTehsils);
        }
    }
}
