<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostPengajianToInfoPengajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info__pengajians', function (Blueprint $table) {
            $table->float('cost_pengajian', 8, 2)->after('mod_pengajian')->default(0);
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
