<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tehsil extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'district_id',
        'name',
        'status'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function panchayat()
    {
        return $this->hasMany(Panchayat::class);
    }

    public function ward(): HasManyThrough
    {
        return $this->hasManyThrough(Ward::class, Panchayat::class);
    }
}
