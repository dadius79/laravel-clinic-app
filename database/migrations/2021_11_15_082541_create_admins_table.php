<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('date_of_birth');
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('national_status', ['Citizen', 'Foreigner']);
            $table->unsignedBigInteger('national_id');
            $table->string('address');
            $table->bigInteger('phone_number');
            $table->bigInteger('emergency_number')->nullable(); 
            $table->mediumInteger('profession_id')->nullable();
            $table->bigInteger('profession_certificate_number')->nullable();
            $table->mediumInteger('admin_role');
            $table->foreign('admin_role')->references('id')->on('admin_roles');
            $table->boolean('active');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
