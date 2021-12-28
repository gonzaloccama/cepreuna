<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemBannerCiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('system_banner_cicles', function (Blueprint $table) {
//            $table->id();
//            $table->string('cicle');
//            $table->string('start_register');
//            $table->string('finish_register');
//            $table->string('start_class');
//            $table->string('finish_class');
//            $table->text('requires')->nullable();
//            $table->string('go_link')->nullable();
//            $table->string('image')->nullable();
//            $table->text('price')->nullable();
//            $table->text('horary')->nullable();
//            $table->enum('status', [0, 1]);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_banner_cicles');
    }
}
