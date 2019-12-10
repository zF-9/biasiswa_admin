<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('up_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //added lps permohonan
            $table->string('startStudy');
            $table->string('EndStudy');
            $table->string('AkademikLvl');
            $table->string('AkademikInfo');
            $table->string('AppliedKursus');
            $table->string('Uni_name');
            $table->string('tmpt_study');

            $table->string('tawaran')->nullable();
            $table->string('surakuan')->nullable();
            //$table->string('Yuran')->nullable();
            //$table->string('Elaun')->nullable();
            //$table->string('Result')->nullable();
            //$table->string('TarikhStart')->nullable();
            //$table->string('TarikhEnd')->nullable();  

            //link document dari applicant(permohonan) pny table
            $table->unsignedBigInteger('applicant_id')->index();
        });

        Schema::table('up_documents', function(Blueprint $table) {
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
        Schema::dropIfExists('up_documents');
    }
}
