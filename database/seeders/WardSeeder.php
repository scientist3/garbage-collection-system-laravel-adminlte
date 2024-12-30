<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DataProviders\WardDataProvider;
use App\Models\Ward;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wardData = WardDataProvider::data();

        // Chunk the ward data and insert in batches
        $chunkSize = 1000; // Adjust this value as needed
        foreach (array_chunk($wardData, $chunkSize) as $chunkWards) {
            Ward::insertOrIgnore($chunkWards);
        }
    }
}
