<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'city_id',
        'name',
        'status'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tensil()
    {
        return $this->hasMany(Tehsil::class);
    }

    public function panchayat(): HasManyThrough
    {
        return $this->hasManyThrough(Panchayat::class, Tehsil::class);
    }
}
