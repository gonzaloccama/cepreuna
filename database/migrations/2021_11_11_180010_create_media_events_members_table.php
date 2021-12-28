<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaEventsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_events_members', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id', false, true);
            $table->integer('user_id', false, true);
            $table->enum('is_invited', [0, 1]);
            $table->enum('is_interested', [0, 1]);
            $table->enum('is_going', [0, 1]);
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
        Schema::dropIfExists('media_events_members');
    }
}
