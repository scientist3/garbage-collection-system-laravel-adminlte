<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HouseType;

class HouseTypeSeeder extends Seeder
{
    public function run()
    {
        $houseTypes = [
            ['name' => 'Single'],
            ['name' => 'Family'],
            ['name' => 'Group']
        ];
        HouseType::insertOrIgnore($houseTypes);
    }
}
