<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_posts_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('node_id', false, true);
            $table->enum('node_type', ['post', 'photo', 'comment','video','file','shared','profile_picture','profile_cover']);
            $table->integer('user_id', false, true);
            $table->enum('user_type', ['user', 'page'])->default('user');
            $table->text('text');
            $table->string('image')->nullable();
            $table->integer('reaction_like_count',  false, true)->nullable();
            $table->integer('reaction_love_count',  false, true)->nullable();
            $table->integer('reaction_haha_count',  false, true)->nullable();
            $table->integer('reaction_yay_count',  false, true)->nullable();
            $table->integer('reaction_wow_count',  false, true)->nullable();
            $table->integer('reaction_angry_count',  false, true)->nullable();
            $table->integer('replies',  false, true)->nullable();
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
        Schema::dropIfExists('media_posts_comments');
    }
}
