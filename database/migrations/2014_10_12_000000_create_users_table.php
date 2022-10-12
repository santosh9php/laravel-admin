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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();

            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            
            $table->string('password');
            $table->string('country_code',15)->nullable();
            $table->string('mobile',30)->unique();
            $table->rememberToken();
            $table->enum('gender', ['m', 'f'])->default('m');
            $table->mediumText('address')->nullable();
            $table->string('photo')->nullable();
            $table->smallInteger('isVerified')->default(0);
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->timestamps();

            $table->enum('status', ['active', 'inactive'])->default('inactive');
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
};
