<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->text('message')->nullable();
            $table->string('subject')->nullable();
            $table->string('attach')->nullable();
            $table->char('answered',5)->default("NO");
            $table->char('seen',5)->default("YES");
            $table->text('answer')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
