<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('assign_unit_no');
            $table->integer('assign_floor_no');
            $table->integer('assign_purchase_price');
            $table->date('assign_tentative_occ_date')->nullable();
            $table->date('assign_purchased_date')->nullable();
            $table->integer('assign_cooperation_percentage');
            $table->integer('assign_deposit_paid');
            $table->integer('created_by');
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
        Schema::dropIfExists('assignments');
    }
}
