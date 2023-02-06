<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionist_vote', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('professionist_id')->nullable();
            $table->foreign('professionist_id')->references('id')->on('professionists')->cascadeOnDelete();

            $table->unsignedBigInteger('vote_id')->nullable();
            $table->foreign('vote_id')->references('id')->on('votes')->cascadeOnDelete();

            $table->text('comment')->nullable();

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
        Schema::dropIfExists('professionist_vote');
    }
};
