<?php

namespace Database\Seeders;
use App\Models\alsalawat;
use Illuminate\Database\Seeder;

class alsalawat_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        alsalawat::create([
            'name' => 1,
            'alfard' => "ركعتان",
            'alsonna_before' => "ركعتان قبل الفجر",
        ]);
        alsalawat::create([
            'name' => 2,
            'alfard' => "ركعتان",
        ]);
        alsalawat::create([
            'name' => 3,
            'alfard' => "اربع ركعات",
            'alsonna_before' => "اربع ركعات قبل الظهر",
            'alsonna_after' => "ركعتان بعد الظهر ",
        ]);
        alsalawat::create([
            'name' => 4,
            'alfard' => "اربع ركعات",
 
        ]);
        alsalawat::create([
            'name' => 5,
            'alfard' => "ثلاث ركعات",
            'alsonna_before' => "ركعتان بعد المغرب",
        ]);
       
        alsalawat::create([
            'name' => 6,
            'alfard' => "اربع ركعات",
            'alsonna_before' => "ركعتان بعد العشاء",
        ]);
    }
}
