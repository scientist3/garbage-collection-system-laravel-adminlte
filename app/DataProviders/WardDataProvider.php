<?php

namespace App\DataProviders;

class WardDataProvider
{
    public static function data()
    {
        return [
            // Wards for Safapora C Panchayat (Tehsil: Safapora, District: Ganderbal)
            ['id' => '1', 'panchayat_id' => '3', 'name' => 'Gratbal-1'],
            ['id' => '2', 'panchayat_id' => '3', 'name' => 'Gratbal-2'],
            ['id' => '3', 'panchayat_id' => '3', 'name' => 'Gratbal-3'],
            ['id' => '4', 'panchayat_id' => '3', 'name' => 'Baghwaan Mohalla -1'],
            ['id' => '5', 'panchayat_id' => '3', 'name' => 'Baghwaan Mohalla -2'],
            ['id' => '6', 'panchayat_id' => '3', 'name' => 'Baghwaan'],
            ['id' => '7', 'panchayat_id' => '3', 'name' => 'Kuchay Mohalla'],
        ];
    }
}
