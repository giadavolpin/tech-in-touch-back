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
        Schema::create('professionist_technology', function (Blueprint $table) {

            $table->unsignedBigInteger('professionist_id')->nullable();
            $table->foreign('professionist_id')->references('id')->on('professionists')->cascadeOnDelete();

            $table->unsignedBigInteger('technology_id')->nullable();
            $table->foreign('technology_id')->references('id')->on('technologies')->cascadeOnDelete();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionist_technology');
    }
};
