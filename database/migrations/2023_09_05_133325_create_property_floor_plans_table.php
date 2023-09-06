<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFloorPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_floor_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->text('floor_plan_image');
            $table->string('plan_suite_no', 100)->default('0');
            $table->string('plan_suite_name', 100)->default('0');
            $table->integer('plan_sq_ft')->default(0);
            $table->float('plan_bath')->default(0);
            $table->float('plan_bed')->default(0);
            $table->integer('plan_availability')->default(0);
            $table->string('plan_terrace_balcony', 50)->default('0');
            $table->unsignedBigInteger('created_by')->default(1);
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
        Schema::dropIfExists('property_floor_plans');
    }
}
