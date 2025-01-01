<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $fillable = [
        'house_type_id',
        'state_id',
        'city_id',
        'district_id',
        'tehsil_id',
        'panchayat_id',
        'ward_id',
        'village',
        'house_owner_name',
        'parentage',
        'phone_no',
        'location',
        'account_status'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function houseType()
    {
        return $this->belongsTo(HouseType::class, 'house_type_id');
    }
    // Has many Dusthins

    public function dustbins()
    {
        return $this->hasMany(Dustbins::class, 'houses_id'); // Reference houses_id explicitly
    }
}
