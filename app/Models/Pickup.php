<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;
    protected $table = 'pickup_records';

    protected $primaryKey = 'id';

    protected $fillable = [
        'dustbin_code',
        'pickup_datetime',
        'status',
        'scanned_by',
        'geo_coordinates',
        'segregation_option',
        'segregation_types',
        'remarks',
        'updated_by',
    ];

    protected $casts = [
        'pickup_datetime' => 'datetime',
        'segregation_types' => 'array', // Cast JSON to array
    ];

    public function getSegregationTypesAsString()
    {
        return implode(', ', $this->segregation_types);
    }

    // Define the relationship with the User model for the scanned_by field
    public function scannedBy()
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }

    // define the relationship with dustbin and then house
    public function dustbin()
    {
        return $this->belongsTo(Dustbins::class, 'dustbin_code', 'dustbin_code');
    }
}
