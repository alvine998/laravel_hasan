<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKomponensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_komponens', function (Blueprint $table) {
            $table->bigIncrements('id_komponen');
            $table->unsignedBigInteger('id_mesin');
            $table->foreign('id_mesin')->references('id_mesin')->on('tb_mesins');
            $table->string('nama_komponen');
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
        Schema::dropIfExists('tb_komponens');
    }
}
