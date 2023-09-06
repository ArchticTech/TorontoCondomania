<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('city_name', 100);
            $table->text('city_image')->nullable();
            $table->string('city_meta_title', 100)->nullable();
            $table->text('city_meta_description')->nullable();
            $table->text('city_meta_keywords')->nullable();
            $table->text('city_description')->nullable();
            $table->unsignedTinyInteger('is_main')->default(0);
            $table->unsignedTinyInteger('for_header')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_by')->default(0);
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
