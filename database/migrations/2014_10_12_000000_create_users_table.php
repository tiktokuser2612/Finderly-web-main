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
            $table->string('user_name');
            $table->string('country_code');
            $table->string('mobile_number');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('otp')->nullable();
            $table->enum('email_verifed', ['0', '1'])->comment('0 => not_verifed, 1 => verifed');

            $table->string('signup_step')->nullable();
            $table->string('signup_type')->nullable();
            $table->enum('status',['1','0'])->comment('1 => Active 0 =>Inactive',);

            $table->timestamp('email_verified_at')->nullable();
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
