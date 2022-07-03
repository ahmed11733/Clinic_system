<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->references('id')->on('users');
            $table->foreignId('doctor_id')->references('id')->on('doctors');
            $table->string('day')->nullable();  // I Added from phpMyadmin
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
        Schema::dropIfExists('select_doctors');
    }
}
