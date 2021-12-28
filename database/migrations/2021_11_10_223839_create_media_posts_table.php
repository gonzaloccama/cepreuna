<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id', false, true);
            $table->enum('user_type', ['user', 'page']);
            $table->enum('in_group', [0, 1]);
            $table->integer('group_id', false, true);
            $table->enum('group_approved', [0, 1]);
            $table->enum('in_event', [0, 1]);
            $table->integer('event_id', false, true);
            $table->enum('event_approved', [0, 1]);
            $table->string('post_type', 32);
            $table->integer('origin_id', false, true);
            $table->string('privacy', 32);
            $table->text('text')->nullable();
            $table->integer('reaction_like_count', false, true)->nullable();
            $table->integer('reaction_love_count', false, true)->nullable();
            $table->integer('reaction_haha_count', false, true)->nullable();
            $table->integer('reaction_yay_count', false, true)->nullable();
            $table->integer('reaction_wow_count', false, true)->nullable();
            $table->integer('reaction_sad_count', false, true)->nullable();
            $table->integer('reaction_angry_count', false, true)->nullable();
            $table->integer('comments', false, true)->nullable();
            $table->integer('shares', false, true)->nullable();

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
        Schema::dropIfExists('media_posts');
    }
}
