<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('name');            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('speciality');  

            
            $table->string('governorate'); 



            $table->string('gender');
            $table->string('mobile_number');          
            $table->longText('photo')->nullable();  


            $table->longText('chinicPhoto1')->nullable(); // for testing in loacl host
            $table->longText('chinicPhoto2')->nullable(); // for testing in loacl host
            $table->longText('chinicPhoto3')->nullable(); // for testing in loacl host

            $table->longText('chinicBill1')->nullable(); // for testing in loacl host
            $table->longText('chinicBill2')->nullable(); // for testing in loacl host

            $table->double('latitude',8,6)->nullable(); // for testing in loacl host
            $table->double('longitude', 9,6)->nullable(); // for testing in loacl host

            $table->string('examinationPrice');
            $table->string('waitTime');


            // Optional Doctor data
            $table->string('about')->nullable();
            $table->string('country')->nullable();
            $table->string('year')->nullable();
            $table->string('uni')->nullable();
            $table->string('degree')->nullable();







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
        Schema::dropIfExists('doctors');
    }
}
