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
            $table->unsignedBigInteger('property_id');
            $table->integer('assign_unit_no');
            $table->integer('assign_floor_no');
            $table->integer('assign_purchase_price');
            $table->date('assign_tentative_occ_date')->nullable();
            $table->date('assign_purchased_date')->nullable();
            $table->integer('assign_cooperation_percentage');
            $table->integer('assign_deposit_paid');
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
        Schema::dropIfExists('assignments');
    }
}
