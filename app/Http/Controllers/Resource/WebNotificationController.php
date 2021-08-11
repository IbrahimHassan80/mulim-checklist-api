<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;

class WebNotificationController extends Controller
{
    private $deviceTokens =[''];

    public function sendNotification()
    {
        return Larafirebase::withTitle('الصلاة')
            ->withBody('حان الان موعد صلاة العصر')
            ->sendNotification($this->deviceTokens);
    }
}
