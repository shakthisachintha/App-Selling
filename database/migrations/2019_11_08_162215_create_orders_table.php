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
            $table->char('paymentType',5)->nullable();
            $table->char('delivered',5)->default('NO');
            $table->integer('amount')->default(0);
         

            $table->text('apk')->nullable();
            $table->text('sourceCode')->nullable();
            $table->text('keyStore')->nullable();
            $table->text('adminLink')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->text('custommsg')->nullable();
            $table->text('guidevideo')->nullable();

            $table->string('responded')->default("NO");
            $table->string('viewed')->default("YES");
            
            $table->char('revision',10)->default("NO");
            
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
