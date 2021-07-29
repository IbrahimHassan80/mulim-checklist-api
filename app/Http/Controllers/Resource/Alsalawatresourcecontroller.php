<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AlsalawatResource;
use App\Models\alsalawat;

class Alsalawatresourcecontroller extends Controller
{
    public function alfagr(){
        return new AlsalawatResource(alsalawat::whereType(1)->first());
    }

    public function aldoha(){
        return new AlsalawatResource(alsalawat::where('type', 2)->first());
    }

    public function aldohr(){
        return new AlsalawatResource(alsalawat::where('type', 3)->first());
    }

    public function alasr(){
        return new AlsalawatResource(alsalawat::where('type', 4)->first());
    }

    public function almaghreb(){
        return new AlsalawatResource(alsalawat::where('type', 5)->first());
    }
    
    public function aleshaa(){
        return new AlsalawatResource(alsalawat::where('type', 6)->first());
    }
}