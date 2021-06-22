<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenggunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penggunas', function (Blueprint $table) {
            $table->bigIncrements('id_pengguna');
            $table->string('nama_pengguna');
            $table->text('alamat');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('roles');
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
        Schema::dropIfExists('tb_penggunas');
    }
}
