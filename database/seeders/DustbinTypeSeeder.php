<?php

namespace Database\Seeders;

use App\Models\DustbinsTypes;
use App\Models\DustbinTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DustbinTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DustbinTypes::insertOrIgnore(['name' => 'Wet']);
        DustbinTypes::insertOrIgnore(['name' => 'Dry']);
    }
}
