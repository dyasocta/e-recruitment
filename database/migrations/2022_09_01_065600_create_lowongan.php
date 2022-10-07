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
        Schema::create('lowongan', function (Blueprint $table) {

            $table->id();
            $table->string('nama_pt');
            $table->string('lokasi');
            $table->string('minimal_jenjang');
            $table->string('kategori');
            $table->string('js_kelamin');
            $table->string('mask_usia');
            $table->string('keahlian');
            $table->string('pengalaman');
            $table->string('desk_pekerjaan');
            $table->string('hari_kerja');
            $table->string('jam_kerja');
            $table->boolean('status');
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
        Schema::dropIfExists('lowongan');
    }
};
