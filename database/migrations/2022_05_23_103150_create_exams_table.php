<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('exam_type')->comment('1 for online 0 for offline');
            $table->integer('duration');
            $table->string('starting_time');
            $table->string('ending_time');
            $table->float('total_marks');
            $table->string('status');
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->integer('school_id');
            $table->integer('session_id');
            $table->integer('category_id');
            $table->longText('class_room_ids')->nullable();
            $table->tinyInteger('is_exercise');
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
        Schema::dropIfExists('exams');
    }
}
