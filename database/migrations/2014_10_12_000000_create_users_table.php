<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('phone', 9)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('role');
            $table->rememberToken();

            $table->string('user_google_id')->nullable();

            $table->enum('user_started', [0, 1])->default(0);
            $table->enum('user_activated', [0, 1])->default(1);
            $table->enum('user_verified', [0, 1])->default(0);
            $table->enum('user_banned', [0, 1])->default(0);

            $table->string('user_firstname');
            $table->string('user_lastname');
            $table->string('user_dni', 8)->nullable();
            $table->tinyInteger('user_gender', false, true)->nullable();
            $table->string('user_picture')->nullable();
            $table->integer('user_picture_id')->nullable();
            $table->string('user_cover')->nullable();
            $table->integer('user_cover_id')->nullable();
            $table->integer('user_album_pictures')->nullable();
            $table->integer('user_album_covers')->nullable();
            $table->integer('user_album_timeline')->nullable();

            $table->string('user_address')->nullable();
            $table->integer('user_country')->nullable();
            $table->integer('user_region')->nullable();
            $table->string('user_province')->nullable();
            $table->date('user_birthdate')->nullable();
            $table->string('user_relationship')->nullable();
            $table->mediumText('user_biography')->nullable();

            $table->string('user_current_city')->nullable();
            $table->string('user_hometown')->nullable();
            $table->string('user_social_facebook')->nullable();
            $table->string('user_social_whatsapp')->nullable();

            $table->boolean('user_privacy_gender')->default(0);
            $table->boolean('user_privacy_birthdate')->default(0);
            $table->boolean('user_privacy_relationship')->default(0);
            $table->boolean('user_privacy_basic')->default(0);

            $table->timestamp('user_seen_at')->nullable();
            $table->timestamp('user_first_failed_login')->nullable();

            $table->boolean('user_is_online')->default(0);
            $table->string('user_last_activity')->nullable();

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
        Schema::dropIfExists('users');
    }
}
