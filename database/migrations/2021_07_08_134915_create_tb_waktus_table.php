<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbWaktusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_waktus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_komponen');
            $table->foreign('id_komponen')->references('id_komponen')->on('tb_komponens');
            $table->unsignedBigInteger('id_mesin');
            $table->foreign('id_mesin')->references('id_mesin')->on('tb_komponens');
            $table->string('waktu_standar');
            $table->integer('jumlah_standar');
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
        Schema::dropIfExists('tb_waktus');
    }
}
