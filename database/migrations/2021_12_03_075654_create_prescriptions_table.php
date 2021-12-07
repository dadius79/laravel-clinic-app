<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('visit_id');
            $table->foreign('visit_id')->references('id')->on('visits');
            $table->char('medicine_code');
            $table->foreign('medicine_code')->references('code')->on('medicines');
            $table->string('strength');
            $table->string('dose');
            $table->mediumInteger('quantity');
            $table->double('amount', 8, 2);
            $table->enum('issuance', ['Pending', 'Completed']);
            $table->bigInteger('prescribed_by');
            $table->foreign('prescribed_by')->references('id')->on('admins');
            $table->bigInteger('issued_by')->nullable();
            $table->foreign('issued_by')->references('id')->on('admins');
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
        Schema::dropIfExists('prescriptions');
    }
}
