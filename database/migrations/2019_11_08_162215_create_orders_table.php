<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->bigInteger('orderId')->unique()->nullable();
            $table->bigInteger('appPlan');
            $table->string('appName');
            $table->string('appLogo')->nullable();
            $table->string('packageName')->nullable();
            $table->string('appVersion')->nullable();
            $table->string('privacy')->nullable();
            $table->string('adminLink')->nullable();
            $table->string('admobBanner')->nullable();
            $table->string('admobInter')->nullable();
            $table->string('admobNative')->nullable();
            $table->string('facebookBanner')->nullable();
            $table->string('facebookInter')->nullable();
            $table->string('facebookNative')->nullable();
            $table->string('facebookNativeBanner')->nullable();
            $table->char('payment',10)->default('NO');
            $table->foreign('user')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('appPlan')->on('app_plans')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
