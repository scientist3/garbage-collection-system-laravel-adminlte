<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PickupRecords;

class PickupRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PickupRecords::insertOrIgnore([
            [
                'dustbin_code' => 'DB001',
                'photo' => 'photo1.jpg',
                'pickup_datetime' => '2023-10-01 08:00:00',
                'status' => 'completed',
                'scanned_by' => 1,
                'geo_coordinates' => '40.712776,-74.005974',
                'pickup_method' => 'manual',
                'remarks' => 'No issues',
            ],
            [
                'dustbin_code' => 'DB002',
                'photo' => 'photo2.jpg',
                'pickup_datetime' => '2023-10-02 09:00:00',
                'status' => 'completed',
                'scanned_by' => 2,
                'geo_coordinates' => '34.052235,-118.243683',
                'pickup_method' => 'automated',
                'remarks' => 'Overflowing',
            ],
            [
                'dustbin_code' => 'DB003',
                'photo' => 'photo3.jpg',
                'pickup_datetime' => '2023-10-03 10:00:00',
                'status' => 'pending',
                'scanned_by' => 3,
                'geo_coordinates' => '41.878113,-87.629799',
                'pickup_method' => 'manual',
                'remarks' => 'Delayed',
            ],
        ]);
    }
}
