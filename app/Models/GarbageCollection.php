<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarbageCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_id', 'garbage_type', 'photo', 'geo_location', 'collected_at'
    ];
}
