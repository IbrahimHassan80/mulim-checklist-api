<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AzkarSeeder;
use Database\Seeders\alsalawat_seeder;
use Database\Seeders\PermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AzkarSeeder::class);
        $this->call(alsalawat_seeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
