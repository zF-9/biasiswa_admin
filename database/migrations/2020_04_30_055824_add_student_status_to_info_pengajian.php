<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudentStatusToInfoPengajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info__pengajians', function (Blueprint $table) {
            $table->string('status_pengajian')->after('AppliedKursus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info__pengajians', function (Blueprint $table) {
            //
        });
    }
}
