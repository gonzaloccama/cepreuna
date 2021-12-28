<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPostsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_posts_articles', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id', false, true);
            $table->string('cover')->nullable();
            $table->string('title');
            $table->text('text');
            $table->integer('category_id', false, true);
            $table->mediumText('tags')->nullable();
            $table->integer('views', false, true)->nullable();
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
        Schema::dropIfExists('media_posts_articles');
    }
}
