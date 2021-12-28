<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaEventsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_events_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_parent_id', false, true)->nullable();
            $table->string('category_name');
            $table->text('category_description');
            $table->integer('category_order', false, true);
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
        Schema::dropIfExists('media_events_categories');
    }
}
