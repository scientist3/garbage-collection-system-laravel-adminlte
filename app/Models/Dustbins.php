<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dustbins extends Model
{
    use HasFactory;
    protected $table = 'dustbins';

    protected $fillable = [
        "dustbin_code",
        "dustbin_type_id",
        "houses_id",
        "geo_coordinates",
    ];

    // houses_id refers to the house to which the dustbin belongs
    public function houses()
    {
        return $this->belongsTo(House::class, 'houses_id');
    }

    // dustbin_type_id refers to the type of dustbintype
    public function dustbintype()
    {
        return $this->belongsTo(DustbinTypes::class, 'dustbin_type_id');
    }
}
