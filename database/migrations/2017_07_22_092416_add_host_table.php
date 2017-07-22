<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no')->references('no')->on('orders');
            $table->string('model');
            $table->integer('user_id')->references('id')->on('users');
            $table->double('price');
            $table->string('host_name');
            $table->string('host_pass');
            $table->string('host_panel');
            $table->longText('end_at');
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
        //
    }
}
