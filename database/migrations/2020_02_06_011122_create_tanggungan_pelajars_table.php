<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggunganPelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggungan_pelajars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tanggung_nama')->nullable();
            $table->string('tanggung_hubungan')->nullable();
            $table->string('tanggung_nokp')->nullable();
            $table->string('tanggung_umur')->nullable();
            $table->timestamps();


            $table->unsignedBigInteger('student_id')->index();
        });

        Schema::table('tanggungan_pelajars', function(Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggungan_pelajars');
    }
}
