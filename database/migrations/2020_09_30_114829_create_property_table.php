<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            // $table->id();
            $table->string('username');
            $table->foreign('username')
                ->references('username')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('property_title');
            $table->string('property_description');
            $table->string('property_condition');
            $table->string('property_price');
            $table->string('property_address');
            $table->string('property_latitude');
            $table->string('property_longitude');
            $table->string('property_pronvece');
            $table->string('property_city');
            $table->string('property_district');
            $table->string('property_surface_area');
            $table->string('property_building_area');
            $table->string('property_bedroom_count');
            $table->string('property_bathroom_count');
            $table->string('property_parking_count');
            $table->json('property_feature')->nullable();
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
        Schema::dropIfExists('property');
    }
}
