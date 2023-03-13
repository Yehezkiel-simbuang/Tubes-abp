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
        Schema::create('utamas', function (Blueprint $table) {
          $table->id();
          $table->string('nama');
          $table->string('uraian');
          $table->string('isi');
          $table->string('jamoperasi');
          $table->string('alamat');
          $table->string('no_telp');
          $table->string('gambarbackground');
          $table->string('gambar');
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
        Schema::dropIfExists('utamas');
    }
};
