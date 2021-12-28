<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPostsPhotosAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_posts_photos_albums', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id', false, true);
            $table->enum('user_type', ['user', 'page'])->default('user');
            $table->enum('in_group', [0, 1])->default(0);
            $table->integer('group_id', false, true)->nullable();
            $table->enum('in_event', [0, 1])->default(0);
            $table->integer('event_id', false, true)->nullable();
            $table->string('title');
            $table->enum('privacy', ['me', 'friends', 'public', 'custom'])->default('public');
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
        Schema::dropIfExists('media_posts_photos_albums');
    }
}
