<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azkar extends Model
{
    use HasFactory;
    protected $table   ='alazkar';
    protected $guarded = [];

    public function getazkar(){ 
        $azkar = [ 1 => 'اذكار الصباح',
                   2 => 'اذكار المساء', 
                   3 => 'اذكار النوم'];
         
        return $azkar[$this->type];    
    }
}