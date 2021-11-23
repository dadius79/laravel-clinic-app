<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_menus', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('sub_menu_id');
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
            $table->string('name');
            $table->string('slug');
            $table->string('url');
            $table->boolean('active');
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
        Schema::dropIfExists('option_menus');
    }
}
