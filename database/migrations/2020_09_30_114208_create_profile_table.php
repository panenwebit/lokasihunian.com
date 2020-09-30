<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            // $table->id();
            $table->string('username');
            $table->foreign('username')
                ->references('username')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('fullname');
            $table->string('photo');
            $table->string('address');
            $table->string('wa_number');
            $table->string('about_me')->nullable();
            $table->string('web_address')->nullable();
            $table->string('fb_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('ig_profile')->nullable();
            $table->string('yt_profile')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
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
        Schema::dropIfExists('profile');
    }
}
