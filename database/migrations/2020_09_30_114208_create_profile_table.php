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
            $table->string('username', 64);
            $table->foreign('username')
                ->references('username')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('fullname');
            $table->string('wa_number', 15);
            $table->text('address');
            $table->string('address_location', 13);
            $table->text('about_me')->nullable();
            $table->string('photo');
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->string('company_location', 13)->nullable();
            $table->string('company_phone', 15)->nullable();
            $table->string('web_address')->nullable();
            $table->string('fb_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('ig_profile')->nullable();
            $table->string('yt_profile')->nullable();
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
