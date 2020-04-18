<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date_pymnt');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('No_baucer');
            $table->string('jenis_pymnt');
            $table->string('tempoh');
            $table->float('amount', 8, 2);
            $table->unsignedBigInteger('payment_id')->index();
            $table->timestamps();
        });

        Schema::table('payment_records', function (Blueprint $table) {
            $table->foreign('payment_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_records');
    }
}
