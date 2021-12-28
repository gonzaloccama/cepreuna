<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('description');
            $table->mediumText('requires')->nullable();
            $table->enum('is_url', [0, 1])->nullable();
            $table->string('url')->nullable();
            $table->mediumText('file_employment')->nullable();
            $table->dateTime('start_employments')->nullable();
            $table->dateTime('end_employments')->nullable();
            $table->text('schedule')->nullable();
            $table->string('go_link')->nullable();
            $table->enum('status', [0, 1])->nullable();
            $table->text('files')->nullable();
            $table->integer('category_employment')->nullable();
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
        Schema::dropIfExists('employments');
    }
}
