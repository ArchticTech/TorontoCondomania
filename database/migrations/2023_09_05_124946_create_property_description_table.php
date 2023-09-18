<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_description', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->text('prop_description');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('created_by')->default(1);
            $table->timestamps();

            $table->foreign('property_id')
                ->references('id')
                ->on('property')
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
        Schema::dropIfExists('property_description');
    }
}
