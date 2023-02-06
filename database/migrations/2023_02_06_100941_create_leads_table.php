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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->string('surname', 15);
            $table->string('email')->unique();
            $table->text('message');
            $table->boolean('read')->default(0);

            $table->unsignedBigInteger('professionist_id')->nullable();
            $table->foreign('professionist_id')->references('id')->on('professionists')->onDelete('set null');

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
        Schema::dropIfExists('leads');
    }
};
