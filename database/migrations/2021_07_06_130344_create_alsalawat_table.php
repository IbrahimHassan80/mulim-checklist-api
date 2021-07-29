<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlsalawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alsalawat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alfard');
            $table->string('alsonna_before');
            $table->string('alsonna_after');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alsalawat');
    }
}
