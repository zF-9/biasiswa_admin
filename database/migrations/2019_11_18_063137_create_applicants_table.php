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
            $table->string('nokp');
            $table->string('trkhlahir');
            $table->string('umur');
            $table->string('tarafkahwin');
            $table->string('telno');
            $table->string('telnoPej');
            $table->string('alamat');
            $table->string('email');
            $table->string('jabatan');
            $table->string('tarikhlantik');
            $table->string('tberkhidmat'); 
            $table->string('jawatan');
            $table->string('skim');
            $table->string('Gred');
            $table->string('TarafLantik');
            $table->string('Tsahjwtn')->nullable();
            //$table->float('budget', 8, 2)->nullable();
            $table->string('Tahun1LPPT');
            $table->string('Tahun2LPPT');
            $table->string('Tahun3LPPT');
            $table->boolean('isApproved')->default(0);

            //$table->integer('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('user_id')->index();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();

            //checklist
            //Nama - Jawatan - Gred - Nama Agensi - Mod Pengajian - Tarikh(Start/End) - Yuran 
            // Yuran - Elaun Sara Diri - Laporan Prestasi (later dlm reporting)

            //link applicant(ppermohonan) dari User punya table
            //$table->unsignedBigInteger('user_id')->index();
        });

        Schema::table('applicants', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
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
