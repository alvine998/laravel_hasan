<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_laporans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_komponen');
            $table->foreign('id_komponen')->references('id_komponen')->on('tb_komponens');
            $table->unsignedBigInteger('id_mesin');
            $table->foreign('id_mesin')->references('id_mesin')->on('tb_komponens');
            $table->date('tanggal_produksi');
            $table->integer('qty_prod');
            $table->integer('good');
            $table->integer('not_good');
            $table->string('masalah'); 
            // TIDAK_ADA, MACHINE, MATERIAL, MAN, METHOD
            $table->string('keterangan');
            $table->integer('status')->nullable();;
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
        Schema::dropIfExists('tb_laporans');
    }
}
