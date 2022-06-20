<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title', 255);
            $table->string('coupon_type', 255);
            $table->bigInteger('discount');
            $table->string('coupon_code', 255);
            $table->bigInteger('max_purchase');
            $table->date('start_date');
            $table->date('expire_date');
            $table->boolean('status')->default(1)->comment('1=active, 0=deactive');
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
        Schema::dropIfExists('coupons');
    }
}
