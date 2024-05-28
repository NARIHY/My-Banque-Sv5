<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Pour faire quelque test
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class TestController extends Controller
{
    public function test()
    {
        $qrCode = QrCode::size(100)
                            ->color(243, 77, 77)
                            ->generate("2022-10-018/z0/1");
        return $qrCode;
    }
}
