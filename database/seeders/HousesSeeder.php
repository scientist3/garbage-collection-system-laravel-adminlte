<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Factory as Faker;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            House::insertOrIgnore([
                'id' => $i,
                'house_type_id' => 1,
                'state_id' => 15,
                'city_id' => 1341,
                'district_id' => 2,
                'tehsil_id' => 13,
                'panchayat_id' => 5,
                'ward_id' => 4,
                'village' => $faker->city,
                'house_owner_name' => $faker->name,
                'parentage' => $faker->name,
                'phone_no' => $faker->phoneNumber,
                'location' => $faker->url,
                'account_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
