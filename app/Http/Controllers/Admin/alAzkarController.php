<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Azkar;
class alAzkarController extends Controller
{
    public function azkarsabah(){
        $azkar = Azkar::select('title','content','count')->where('type', 1)->get();
        return view('Admin.Alazkar.azkarsabah', compact('azkar'));
    }
    public function azkarmasaa(){
        $azkar = Azkar::select('title','content','count')->where('type', 2)->get();
        return view('Admin.Alazkar.azkarmasaa', compact('azkar'));
    }
    
    public function azkarnoom(){
        $azkar = Azkar::select('title','content','count')->where('type', 3)->get();
        return view('Admin.Alazkar.azkarnoom', compact('azkar'));
    }
}
