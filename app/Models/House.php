<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $fillable = [
        'state',
        'district',
        'tensil',
        'panchayat',
        'ward',
        'village',
        'house_owner_name',
        'parentage',
        'phone_no',
        'location',
        'wet_garbage_qr',
        'dry_garbage_qr'
    ];
}
