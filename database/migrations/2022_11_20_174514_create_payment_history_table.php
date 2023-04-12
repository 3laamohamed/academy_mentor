<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->integer('user_id');
            $table->integer('course_id')->nullable();
            $table->integer('package_id');
            $table->unsignedDecimal('amount');
            $table->integer('school_id');
            $table->longText('transaction_keys');
            $table->string('document_image');
            $table->string('paid_by');
            $table->string('status');
            $table->integer('timestamp');
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
        Schema::dropIfExists('payment_history');
    }
};
