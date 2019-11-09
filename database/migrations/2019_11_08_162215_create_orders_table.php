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
            $table->string('appLogo')->default('public/applogos/def_app.png');
            $table->string('packageName')->nullable();
            $table->string('appVersion')->nullable();
            $table->string('privacy')->nullable();
            
            $table->string('admobBanner')->nullable();
            $table->string('admobInter')->nullable();
            $table->string('admobNative')->nullable();
            $table->string('admobinteraftrclck')->nullable();

            $table->string('facebookBanner')->nullable();
            $table->string('facebookInter')->nullable();
            $table->string('facebookNative')->nullable();
            $table->string('facebookNativeBanner')->nullable();
            $table->string('fbintraftclck')->nullable();

            $table->char('payment',5)->default('NO');
            $table->char('delivered',5)->default('NO');
            $table->integer('amount')->default(0);
            $table->foreign('user')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('appPlan')->on('app_plans')->references('id')->onDelete('cascade');

            $table->string('apk');
            $table->string('sourceCode');
            $table->string('keyStore');
            $table->string('adminLink')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('custommsg')->nullable();
            $table->string('guidevideo')->nullable();

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
