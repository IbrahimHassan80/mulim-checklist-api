<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alsalawat extends Model
{
    use HasFactory;
    protected $table   ='alsalawat';
    protected $guarded = [];
    
    const TYPE_FAGR      = 1;
    const TYPE_doha      = 2;
    const TYPE_aldohr    = 3;
    const TYPE_alasr     = 4;
    const TYPE_almaghreb = 5;
    const TYPE_al3eshaa  = 6;

    public function alsalawat(){
        $salah = [
            self::TYPE_FAGR => 'صلاة الفجر',
            self::TYPE_doha => 'صلاة الضحى',
            self::TYPE_aldohr => 'صلاة الظهر',
            self::TYPE_alasr => 'صلاة العصر',
            self::TYPE_almaghreb => 'صلاة المغرب',
            self::TYPE_al3eshaa => 'صلاة العشاء',
        ];
        return $salah[$this->type];
    }
   
   
    // public static function test()
    // {
    //     return [
    //         self::TYPE_al3eshaa => 'ewr'
    //     ];
    // }

    // public function typeText()
    // {
    //     return self::test()[$this->type];
    // }
}
