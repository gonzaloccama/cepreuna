<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->mediumText('website_short_description');
            $table->integer('website_executive');

            $table->text('website_phones');
            $table->text('website_emails');
            $table->text('website_addresses');
            $table->text('website_campus')->nullable();
            $table->text('website_media_social')->nullable();
            $table->text('website_facebook_page')->nullable();

            $table->string('website_logo_1st')->nullable();
            $table->string('website_logo_2sd')->nullable();
            $table->string('website_favicon')->nullable();

            $table->text('website_mission')->nullable();
            $table->text('website_vision')->nullable();
            $table->text('website_objectives')->nullable();
            $table->text('website_history')->nullable();
            $table->text('website_values')->nullable();
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
        Schema::dropIfExists('system_settings');
    }
}
