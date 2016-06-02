<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function(Blueprint $table) {
            $table->increments('id');
            $table->string('firt_name');
            $table->string('last_name');
            $table->integer('address_id');
            $table->string('picture');
            $table->string('email');
            $table->integer('store_id');
            $table->integer('active');
            $table->string('username');
            $table->string('password');
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
        Schema::drop('staff');
    }
}
