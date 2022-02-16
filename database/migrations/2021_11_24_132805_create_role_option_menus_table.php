<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleOptionMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_option_menus', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('role_id');
            $table->foreign('role_id')->references('id')->on('admin_roles');
            $table->unsignedMediumInteger('option_menu_id');
            $table->foreign('option_menu_id')->references('id')->on('option_menus');
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
        Schema::dropIfExists('role_option_menus');
    }
}
