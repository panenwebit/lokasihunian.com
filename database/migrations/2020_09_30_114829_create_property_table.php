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
            $table->id();
            $table->string('username', 64);
            $table->foreign('username')
                ->references('username')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('property_title');
            $table->text('property_description');
            $table->enum('property_term', ['Beli', 'Sewa']);
            $table->enum('property_condition', ['Baru', 'Bekas']);
            $table->enum('property_type', ['Apartemen', 'Rumah', 'Tanah', 'Ruko', 'Vila']);
            $table->string('property_price');
            $table->text('property_address');
            $table->string('property_location', 13);
            $table->string('property_latitude', 20);
            $table->string('property_longitude', 20);
            $table->string('property_provence');
            $table->string('property_city');
            $table->string('property_district');
            $table->string('property_surface_area', 5);
            $table->string('property_building_area', 5);
            $table->string('property_bedroom_count', 5);
            $table->string('property_bathroom_count', 5);
            $table->string('property_parking_count', 5);
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
