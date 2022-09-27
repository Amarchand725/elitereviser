<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->bigInteger('service_id');
            $table->bigInteger('sub_service_id');
            $table->string('language');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('total_words');
            $table->bigInteger('total_pages');
            $table->string('service_type');
            $table->string('trunarround_time');
            $table->string('currency');
            $table->bigInteger('discount_type')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('sub_amount');
            $table->float('total_amount');
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
        Schema::dropIfExists('order_details');
    }
}
