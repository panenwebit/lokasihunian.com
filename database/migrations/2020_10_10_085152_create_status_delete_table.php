<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusDeleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_delete', function (Blueprint $table) {
            $table->id();
            $table->string('table_name', 150)->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->enum('status', ['deleted', 'show']);
            $table->string('username', 64);
            // $table->foreign('username')
            //     ->references('username')
            //     ->on('users')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_delete');
    }
}
