<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MercadoControlItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadocontrol_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_create');
            $table->unsignedBigInteger('user_update')->nullable();
            $table->string('barcode');
            $table->string('category');
            $table->string('brand');
            $table->string('title');
            $table->string('model');
            $table->string('mpn');
            $table->string('description');
            $table->text('data');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marketplace_id');
            $table->string('user');
            $table->string('password');
            $table->unsignedBigInteger('shop_id');
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
