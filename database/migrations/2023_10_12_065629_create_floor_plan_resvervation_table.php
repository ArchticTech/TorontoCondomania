<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorPlanResvervationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_plan_resvervation', function (Blueprint $table) {
            $table->id();
            $table->integer('property_floor_plan_id');
            $table->integer('tbl_user_id');
            $table->string('first_name_1', 70);
            $table->string('last_name_1', 70);
            $table->string('email_1', 100);
            $table->string('phone_number_1', 70)->nullable();
            $table->string('street_address_1', 200)->nullable();
            $table->string('city_1', 70)->nullable();
            $table->string('postal_code_1', 70)->nullable();
            $table->string('occupation_1', 70);
            $table->text('photo_1')->nullable();
            $table->string('first_name_2', 70)->nullable();
            $table->string('last_name_2', 70)->nullable();
            $table->string('email_2', 100)->nullable();
            $table->string('phone_number_2', 70)->nullable();
            $table->string('street_address_2', 200)->nullable();
            $table->string('city_2', 70)->nullable();
            $table->string('postal_code_2', 70)->nullable();
            $table->string('occupation_2', 70)->nullable();
            $table->text('photo_2')->nullable();
            $table->string('reservation_status', 50)->default('Pending');
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
        Schema::dropIfExists('floor_plan_resvervation');
    }
}
