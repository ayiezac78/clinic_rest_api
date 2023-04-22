<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_infos', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->date('appointment_date');
            $table->string('schedule_time');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('email_address');
            $table->string('address');
            $table->text('medical_concern');
            $table->string('appointment_status')->default('Pending');
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
        Schema::dropIfExists('patients_infos');
    }
};
