<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'panchayat_id',
        'name',
        'status'
    ];

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class);
    }

    // public function garbageCollection()
    // {
    //     return $this->hasMany(GarbageCollection::class);
    // }
}
