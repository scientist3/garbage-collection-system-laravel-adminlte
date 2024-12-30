<?php

namespace App\DataProviders;

class PanchayatDataProvider
{
    public static function data()
    {
        // ['id' => '13', 'district_id' => '2', 'name' => 'Safapora'],
        return [
            // Panchayats for Safapora Tehsil (District Ganderbal)
            ['id' => '1', 'tehsil_id' => '13', 'name' => 'Phelipora-A'],
            ['id' => '2', 'tehsil_id' => '13', 'name' => 'Phelipora-B'],
            ['id' => '3', 'tehsil_id' => '13', 'name' => 'Safapora A'],
            ['id' => '4', 'tehsil_id' => '13', 'name' => 'Safapora B'],
            ['id' => '5', 'tehsil_id' => '13', 'name' => 'Safapora C'],
            ['id' => '6', 'tehsil_id' => '13', 'name' => 'Safapora D'],

            // Panchayats for Hazratbal Tehsil (Srinagar District)
            ['id' => '11', 'tehsil_id' => '5', 'name' => 'Nigeen Panchayat'],
            ['id' => '12', 'tehsil_id' => '5', 'name' => 'Zakura Panchayat'],
            ['id' => '13', 'tehsil_id' => '5', 'name' => 'Habak Panchayat'],
            ['id' => '14', 'tehsil_id' => '5', 'name' => 'Tailbal Panchayat'],
            ['id' => '15', 'tehsil_id' => '5', 'name' => 'Buchpora Panchayat'],
        ];
    }
}
