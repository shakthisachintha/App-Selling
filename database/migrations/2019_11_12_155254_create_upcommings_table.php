<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpcommingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcommings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('icon')->default('appimage/def_app.png');
            $table->string('prevLink')->nullable();
            $table->string('videoLink')->nullable();
            $table->string('price')->nullable();
            $table->string('hprice')->nullable();
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('upcommings');
    }
}
