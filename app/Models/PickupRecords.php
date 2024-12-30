<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupRecords extends Model
{
    use HasFactory;

    protected $table = 'pickup_records';

    protected $fillable = [
        "id",
        "dustbin_code",
        "photo",
        "pickup_datetime",
        "status",
        "scanned_by",
        "geo_coordinates",
        "pickup_method",
        "remarks",
    ];

    // dustbin_code refers to the dustbin to which the record belongs
    public function dustbin()
    {
        return $this->belongsTo(Dustbins::class, 'dustbin_code');
    }
    // scanned_by refers to the user who scanned the record
    public function scannedby()
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }
}
