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
            $table->id();
            $table->text('address');
            $table->string('phone_number', 15);
            $table->string('wa_number', 15);
            $table->text('about_us');
            $table->text('privacy_policy');
            $table->text('tnc');
            $table->string('web_address');
            $table->string('fb_profile');
            $table->string('twitter_profile');
            $table->string('ig_profile');
            $table->string('yt_profile');
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
