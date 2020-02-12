<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPengajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info__pengajians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //added lps permohonan
            $table->string('startStudy');
            $table->string('EndStudy');
            $table->string('AppliedKursus');
            $table->string('mod_pengajian');
            $table->string('Uni_name');
            //$table->string('Uni_namePT');
            $table->string('tmpt_study');
            $table->string('tmpt_study1')->nullable();
            $table->string('tmpt_study2')->nullable();


            $table->string('tawaran')->nullable();
            $table->string('surakuan')->nullable();

            //link document dari applicant(permohonan) pny table
            $table->unsignedBigInteger('applicant_id')->index();
        });

        Schema::table('info__pengajians', function(Blueprint $table) {
            $table->foreign('applicant_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info__pengajians');
    }
}
