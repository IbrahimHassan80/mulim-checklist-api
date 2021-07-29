<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Azkarresource;
use App\Http\Resources\AzkarsleepResource;
use App\Models\Azkar;

class azkarresourcecontroller extends Controller
{
    public function azkarS(){
        return Azkarresource::collection(Azkar::where('type', 1)->select('type','title','content','count')->get());
    }

    public function azkarM(){
        return Azkarresource::collection(Azkar::where('type', 2)->select('type','title','content','count')->get());
    }

    public function azkarSleep(){
        return AzkarsleepResource::collection(Azkar::where('type', 3)->select('type','content','count')->get());
    }

}