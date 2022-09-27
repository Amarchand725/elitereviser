<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('user_id')->comment('customer id');
            $table->string('coupon_id')->nullable();
            $table->bigInteger('order_number')->comment('Generate 6 digits random number as a order number');
            $table->string('order_type')->default('paid')->comment('Paid or Free');
            $table->float('total_amount');
            $table->string('discount_type')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('tax')->nullable();
            $table->float('net_amount')->nullable();
            $table->date('order_date');
            $table->string('order_status')->comment('succeeded, failed');
            $table->string('payment_status')->default('unpaid');
            $table->text('client_note')->nullable();
            $table->string('document')->nullable();
            $table->Integer('acceptance')->default(0)->comment('1:Accepted, 2:Process, 3. Rejected, 4:Completed, By Admin');
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
