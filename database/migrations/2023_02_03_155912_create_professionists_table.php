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
        Schema::create('professionists', function (Blueprint $table) {
            $table->id();
            $table->string('nickname', 15)->nullable()->unique();
            $table->string('slug', 100);
            $table->string('job_address')->nullable();
            $table->string('profile_image')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('cv_path');
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->float('avg_vote')->nullable();
            $table->boolean('visible')->default(1);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
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
        Schema::dropIfExists('professionists');
    }
};
