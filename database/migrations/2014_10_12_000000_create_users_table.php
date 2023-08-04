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
            $table->id()->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->unique();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('company_name');
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_confirmation');
            $table->enum("user_type", ["admin", "user", "driver"])->default("user");
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
