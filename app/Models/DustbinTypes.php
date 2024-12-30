<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DustbinTypes extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'dustbin_types';

    protected $fillable = [
        "id",
        "name",
    ];


    // public function dustbins()
    // {
    //     return $this->hasMany(Dustbins::class);
    // }
}
