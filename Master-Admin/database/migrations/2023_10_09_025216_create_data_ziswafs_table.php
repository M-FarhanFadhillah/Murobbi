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
        Schema::create('data_ziswafs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('masjid_id');
            $table->foreignId('jenis_ziswaf_id');
            $table->integer('no_rek');
            $table->string('asal_bank');
            $table->float('nominal', 20, 2);
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
        Schema::dropIfExists('data_ziswafs');
    }
};
