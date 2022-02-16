<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('national_status', ['Citizen', 'Foreigner']);
            $table->unsignedBigInteger('national_id');
            $table->string('address');
            $table->unsignedBigInteger('phone_number');
            $table->unsignedBigInteger('emergency_number')->nullable();
            $table->unsignedBigInteger('registered_by');
            $table->foreign('registered_by')->references('id')->on('admins');
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
        Schema::dropIfExists('patients');
    }
}
