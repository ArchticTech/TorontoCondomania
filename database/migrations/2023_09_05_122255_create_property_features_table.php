<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->default(0);
            $table->text('prop_feature');
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
        Schema::dropIfExists('property_features');
    }
}
