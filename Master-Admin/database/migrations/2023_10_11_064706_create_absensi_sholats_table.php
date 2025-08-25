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
        Schema::create('absensi_sholats', function (Blueprint $table) {
            $table->id();
            //Absensi Sholat Memiliki banyak waktu sholat
            $table->foreignId('waktu_sholat_id');
            //Absensi Sholat Memiliki satu user
            $table->foreignId('users_id');
            // 0 : Berjamaah, 1 : Sendirian
            $table->enum('status_sholat', ['Berjamaah', 'Sendirian']);
            // 0 : Di Masjid, 1 : Di Rumah
            $table->enum('lokasi_sholat', ['Masjid', 'Rumah']);
            $table->date('tanggal_sholat')->default(now());
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
        Schema::dropIfExists('absensi_sholats');
    }
};
