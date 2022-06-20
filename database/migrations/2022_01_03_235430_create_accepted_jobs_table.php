<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number');
            $table->bigInteger('editor_id');
            $table->date('accepted_date');
            $table->string('document')->nullable();
            $table->text('editor_note')->nullable();
            $table->date('completed_date')->nullable();
            $table->integer('status')->default(1)->comment('0:Pending, 1:Process, 2:Rejected,3:Completed by editor');
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
        Schema::dropIfExists('accepted_jobs');
    }
}
