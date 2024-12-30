<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        House::insertOrIgnore([
            'id' => 1,
            'state_id' => 15,
            'city_id' => 1341,
            'district_id' => 2,
            'tehsil_id' => 13,
            'panchayat_id' => 5,
            'ward_id' => 4,
            'village' => 'Safapora',
            'house_owner_name' => 'Aamir Bashir',
            'parentage' => 'Bashir Ahmad Sofi',
            'phone_no' => '7006123265',
            'location' => 'https://maps.app.goo.gl/PW5dNKQo78NZTQ648',
            'wet_garbage_qr' => '123',
            'dry_garbage_qr' => '1234',
            'created_at' => '2024-12-30 00:00:00',
            'updated_at' => '2024-12-30 00:00:00',
        ]);
    }
}
