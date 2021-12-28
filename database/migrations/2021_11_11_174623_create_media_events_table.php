<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_events', function (Blueprint $table) {
            $table->id();
            $table->enum('event_privacy', ['secret', 'closed', 'public'])->default('public');
            $table->integer('event_admin', false, true);
            $table->integer('event_category', false, true);
            $table->string('event_title');
            $table->string('event_location');
            $table->mediumText('event_description');
            $table->dateTime('event_start_date');
            $table->dateTime('event_end_date');
            $table->enum('event_publish_enabled', [0, 1])->default(1);
            $table->enum('event_publish_approval_enabled', [0, 1])->default(0);
            $table->string('event_cover')->nullable();
            $table->integer('event_cover_id', false, true)->nullable();
            $table->integer('event_album_covers', false, true)->nullable();
            $table->integer('event_album_timeline', false, true)->nullable();
            $table->integer('event_invited', false, true)->nullable();
            $table->integer('event_interested', false, true)->nullable();
            $table->integer('event_going', false, true)->nullable();
            $table->integer('event_date', false, true)->nullable();
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
        Schema::dropIfExists('media_events');
    }
}
