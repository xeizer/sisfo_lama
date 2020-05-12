<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nip')->unique()->nullable();
            $table->string('nuptk')->unique()->nullable();
            $table->string('status')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('golongan')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('npwp')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('no_sk_pengangkatan')->nullable();
            $table->string('tmt_pengangkatan')->nullable();
            $table->string('no_sertifikasi')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
