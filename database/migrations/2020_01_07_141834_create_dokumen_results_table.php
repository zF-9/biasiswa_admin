<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date_penyerahan');
            $table->string('perkara');
            $table->string('tempoh');
            $table->float('tuntutan', 8, 2);
            $table->string('file');
            $table->timestamps();
            $table->unsignedBigInteger('document_id')->index();
        });
        Schema::table('dokumen_results', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_results');
    }
}
