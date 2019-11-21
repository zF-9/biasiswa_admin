<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nama');
            $table->string('email');
            $table->string('nokp');
            $table->string('jabatan');
            $table->string('jawatan');
            $table->string('bidang');
            $table->string('universiti');
            $table->string('akademik');
            $table->string('telno');
            $table->string('tarikhlantik');
            $table->string('Gred');
            $table->string('pengajian');

            //added lps permohonan
            $table->string('tawaran')->nullable();
            $table->string('surakuan')->nullable();
            $table->string('Yuran')->nullable();
            $table->string('Elaun')->nullable();
            $table->string('Result')->nullable();
            $table->string('TarikhStart')->nullable();
            $table->string('TarikhEnd')->nullable();

            //checklist
            //Nama - Jawatan - Gred - Nama Agensi - Mod Pengajian - Tarikh(Start/End) - Yuran 
            // Yuran - Elaun Sara Diri - Laporan Prestasi (later dlm reporting)

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
        Schema::dropIfExists('applicants');
    }
}
