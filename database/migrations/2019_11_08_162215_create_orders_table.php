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
            $table->bigInteger('user_id');
            $table->bigInteger('orderId')->unique()->nullable();
            $table->bigInteger('app_plan_id');
            $table->string('appName');
            $table->string('appLogo')->default('public/applogos/def_app.png');
            $table->string('packageName')->nullable();
            $table->string('appVersion')->nullable();
            $table->string('privacy')->nullable();
            
            $table->text('admobBanner')->nullable();
            $table->text('admobInter')->nullable();
            $table->text('admobNative')->nullable();
            $table->text('admobintraftclck')->nullable();

            $table->text('facebookBanner')->nullable();
            $table->text('facebookInter')->nullable();
            $table->text('facebookNative')->nullable();
            $table->text('facebookNativeBanner')->nullable();
            $table->text('fbintraftclck')->nullable();

            $table->char('payment',5)->default('NO');
            $table->char('delivered',5)->default('NO');
            $table->integer('amount')->default(0);
            // $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            // $table->foreign('app_plan_id')->on('app_plans')->references('id')->onDelete('cascade');

            $table->text('apk')->nullable();
            $table->text('sourceCode')->nullable();
            $table->text('keyStore')->nullable();
            $table->text('adminLink')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->text('custommsg')->nullable();
            $table->text('guidevideo')->nullable();

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
