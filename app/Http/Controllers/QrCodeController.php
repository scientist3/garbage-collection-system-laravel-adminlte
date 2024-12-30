<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //
    public function show()
    {
        $from = [255, 0, 0];
        $to = [0, 0, 255];

        return QrCode::size(200)
            ->style('dot')
            ->eye('circle')
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->margin(1)
            ->generate(
                'gcsystem.newgreenlandschool.in/admin/house',
            );
    }

    public function download()
    {
        // $str = base64_encode(QrCode::format("png")->size(256)->generate("https://google.com"));
        // echo '<img src="data:image/png;base64,' . $str . '">';

        return response()->streamDownload(
            function () {
                echo QrCode::size(200)
                    ->format('png')
                    ->generate('https://gcsystem.newgreenlandschool.in/qrcode');
            },
            'qr-code.png',
            [
                'Content-Type' => 'image/png',
            ]
        );
    }
}
