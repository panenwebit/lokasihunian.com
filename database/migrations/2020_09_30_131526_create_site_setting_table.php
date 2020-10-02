<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_setting', function (Blueprint $table) {
            $table->text('site_address');
            $table->string('site_phone_number', 15);
            $table->string('site_wa_number', 15);
            $table->text('site_about_us');
            $table->string('web_address');
            $table->string('fb_profile');
            $table->string('twitter_profile');
            $table->string('ig_profile');
            $table->string('yt_profile');
            $table->string('site_latitude', 20);
            $table->string('site_longitude', 20);
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
        Schema::dropIfExists('site_setting');
    }
}
