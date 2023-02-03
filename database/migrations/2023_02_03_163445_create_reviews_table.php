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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            
            $table->unsignedBigInteger('professionist_id');
            $table->foreign('professionist_id')->references('id')->on('professionists')->onDelete('set null');

            $table->unsignedBigInteger('vote_id')->nullable();
            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('set null');

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
        Schema::dropIfExists('reviews');
    }
};
