<?php
   
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
   
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('school_id')->nullable();
            $table->string('password');
            $table->string('code')->nullable();
            $table->longText('user_information')->nullable();
            $table->string('department_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('device_id')->nullable();
            $table->string('class_id')->nullable();
            $table->string('class_room_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('blocked')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}