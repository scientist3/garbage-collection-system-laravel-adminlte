<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Dustbins extends Model
{
    use HasFactory;

    protected $table = 'dustbins';

    // Specify the primary key column
    protected $primaryKey = 'dustbin_code';

    // Indicate that the primary key is not auto-incrementing
    public $incrementing = false;

    // If the primary key is not an integer, set the key type
    protected $keyType = 'string';


    protected $fillable = [
        "dustbin_code",
        "dustbin_type_id",
        "houses_id",
        "geo_coordinates",
    ];

    // Define an accessor to generate QR code dynamically
    public function getQrCodeAttribute()
    {
        $from = [255, 0, 0];
        $to = [0, 0, 255];
        // $serverUrl = $_SERVER['HTTP_HOST'] . '/scan/' . encrypt($this->dustbin_code);
        // Get the IP address of the server
        $serverIp = gethostbyname(gethostname());

        // Construct the URL
        if (app()->environment('production')) {
            $serverUrl = 'https://gcsystem.newgreenlandschool.in/scan/' . encrypt($this->dustbin_code);
        } else {
            $serverUrl = 'https://' . $serverIp . '/garbage-collection-system-laravel-adminlte/public/scan/' . encrypt($this->dustbin_code);
        }
        print_r($serverUrl);
        // die();
        return QrCode::size(300)
            ->style('dot')
            ->eye('circle')
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->margin(1)
            ->generate($serverUrl);
    }

    // houses_id refers to the house to which the dustbin belongs
    public function house()
    {
        return $this->belongsTo(House::class, 'houses_id');
    }
    // dustbin_type_id refers to the type of dustbintype
    public function dustbintype()
    {
        return $this->belongsTo(DustbinTypes::class, 'dustbin_type_id');
    }
}
