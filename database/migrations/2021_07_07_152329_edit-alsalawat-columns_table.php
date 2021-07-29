<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAlsalawatColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alsalawat', function (Blueprint $table) {
      
            $table->integer('name')->nullable()->change();
            $table->string('alsonna_before')->nullable()->change();
            $table->string('alsonna_after')->nullable()->change();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
