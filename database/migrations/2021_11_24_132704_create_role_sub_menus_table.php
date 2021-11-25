<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_sub_menus', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('role_id');
            $table->foreign('role_id')->references('id')->on('admin_roles');
            $table->mediumInteger('sub_menu_id');
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
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
        Schema::dropIfExists('role_sub_menus');
    }
}
