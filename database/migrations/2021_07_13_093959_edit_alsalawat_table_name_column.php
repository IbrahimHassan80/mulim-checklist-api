<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAlsalawatTableNameColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alsalawat', function (Blueprint $table) {
            $table->renameColumn('name', 'type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alsalawat', function (Blueprint $table) {
            $table->renameColumn('type', 'name');
        });
    }
}
