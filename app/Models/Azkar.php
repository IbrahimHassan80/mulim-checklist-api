<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azkar extends Model
{
    use HasFactory;
    protected $table   ='alazkar';
    protected $guarded = [];

    const AZKAR_SABAH      = 1;
    const AZKAR_MASAA      = 2;
    const AZKAR_ALNOOM     = 3;

    public function getazkar(){ 
        $azkar = [ self::AZKAR_SABAH => 'اذكار الصباح',
                   self::AZKAR_MASAA => 'اذكار المساء', 
                   self::AZKAR_ALNOOM => 'اذكار النوم'];
         
        return $azkar[$this->type];    
    }
}