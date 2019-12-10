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
            $table->string('No_baucer');
            $table->string('Amount');
            $table->string('jenis_pymnt');

            $table->timestamps();
            $table->unsignedBigInteger('payment_ID')->index();
        });

        Scheme::table('payment_records', function (Blueprint $table) {
            $table->foreign('payment_ID')->references('id')->on('users');
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
