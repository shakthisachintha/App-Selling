<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed__orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order');
            $table->string('apk');
            $table->string('sourceCode');
            $table->string('keyStore');
            $table->timestamps();
            $table->char("status",5)->default("NEW");
            $table->foreign("order")->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed__orders');
    }
}
