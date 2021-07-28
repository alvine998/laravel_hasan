<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPerencanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_perencanaans', function (Blueprint $table) {
            $table->bigIncrements('id_perencanaan');
            $table->unsignedBigInteger('id_kustomer');
            $table->foreign('id_kustomer')->references('id_kustomer')->on('tb_kustomers');
            $table->unsignedBigInteger('id_komponen');
            $table->foreign('id_komponen')->references('id_komponen')->on('tb_komponens');
            $table->date('tanggal_produksi');
            $table->integer('plan');
            $table->integer('actual');
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
        Schema::dropIfExists('tb_perencanaans');
    }
}
