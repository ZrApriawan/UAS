<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GolonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golongan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_golongan', 5);
            $table->string('nama_golongan', 10);
            $table->integer('tunjangan_suami_istri');
            $table->integer('tunjangan_anak');
            $table->integer('uang_lembur');
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
        Schema::dropIfExists('golongan');
    }
}