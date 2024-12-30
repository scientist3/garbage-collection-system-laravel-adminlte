<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Panchayat extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'id',
        'tehsil_id',
        'name',
        'status'
    ];

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }

    public function ward()
    {
        return $this->hasMany(Ward::class);
    }
}
