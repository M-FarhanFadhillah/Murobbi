<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjids', function (Blueprint $table) {
            $table->id();
            $table->string('masjid_name');
            $table->string('masjid_pict');
            $table->text('alamat');
            $table->string('ketua_masjid');
            $table->integer('kapasitas');
            $table->float('saldo_awal', 20, 2); //pindah ke masjid
            $table->float('kas', 20, 2);
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
        Schema::dropIfExists('masjids');
    }
};
