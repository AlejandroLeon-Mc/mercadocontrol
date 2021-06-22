<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_create');
            $table->unsignedBigInteger('user_update')->nullable();
            $table->bigInteger("source_providers_id");
            $table->text("json");
            $table->string("ean");
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
        Schema::dropIfExists('source_items');
    }
}
