<?php

namespace Database\Seeders;

use App\Models\Pickup;
use App\Models\User;
use App\Models\Dustbins;
use Illuminate\Database\Seeder;

class PickupRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $dustbins = Dustbins::pluck('id')->toArray();

        $pickups = [];
        for ($i = 1; $i <= 20; $i++) {
            $user = $users[array_rand($users)];
            $dustbin = $dustbins[array_rand($dustbins)];
            $pickup_datetime = now()->subDays(rand(0, 30))->format('Y-m-d H:i:s');
            $segregation_option = rand(0, 1) ? 'segregated' : 'non_segregated';
            $segregation_types = $segregation_option === 'segregated' ? json_encode(array_rand(['dry' => 'dry', 'wet' => 'wet'], rand(1, 2))) : json_encode([]);

            $pickups[] = [
                'dustbin_code' => $dustbin,
                'pickup_datetime' => $pickup_datetime,
                'status' => rand(0, 1) ? 'completed' : 'pending',
                'scanned_by' => $user,
                'geo_coordinates' => '40.712776,-74.005974',
                'segregation_option' => $segregation_option,
                'segregation_types' => $segregation_types,
                'remarks' => 'No issues',
                'updated_by' => $user,
            ];
        }

        Pickup::insertOrIgnore($pickups);
    }
}
