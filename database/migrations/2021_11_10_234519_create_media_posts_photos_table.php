<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPostsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_posts_photos', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id', false, true);
            $table->integer('album_id', false, true);
            $table->string('source');
            $table->enum('blur', [0, 1])->default(0);
            $table->integer('reaction_like_count', false, true)->nullable();
            $table->integer('reaction_love_count', false, true)->nullable();
            $table->integer('reaction_haha_count', false, true)->nullable();
            $table->integer('reaction_yay_count', false, true)->nullable();
            $table->integer('reaction_wow_count', false, true)->nullable();
            $table->integer('reaction_sad_count', false, true)->nullable();
            $table->integer('reaction_angry_count', false, true)->nullable();
            $table->integer('comments', false, true)->nullable();
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
        Schema::dropIfExists('media_posts_photos');
    }
}
