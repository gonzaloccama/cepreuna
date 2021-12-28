<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCycleAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycle_academies', function (Blueprint $table) {
            $table->id();
            $table->string('cicle');
            $table->dateTime('start_register');
            $table->dateTime('finish_register');
            $table->date('start_class');
            $table->date('finish_class');
            $table->text('requires')->nullable();
            $table->string('go_link')->nullable();
            $table->string('image')->nullable();
            $table->text('price')->nullable();
            $table->text('horary')->nullable();
            $table->enum('status', [0, 1]);
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
        Schema::dropIfExists('cycle_academies');
    }
}
