<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_id');
            $table->string('image', 300)->default(null);
            $table->unsignedBigInteger('created_by')->default(1);
            $table->timestamps();
            
            $table->foreign('rental_id')
                ->references('id')
                ->on('rentals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_images');
    }
}
