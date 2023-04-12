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
        Schema::create('android_app_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->longText('app_url');
            $table->integer('minimum_version');
            $table->boolean('maintenance_mode')->default(1);
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
        Schema::dropIfExists('android_app_configs');
    }
};
