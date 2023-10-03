<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->index('slug');
            $table->string('name');
            $table->text('rent_address');
            $table->string('rent_type', 70);
            $table->integer('rent_beds');
            $table->integer('rent_baths');
            $table->string('rent_sqft', 50);
            $table->date('available_date');
            $table->integer('monthly_rent');
            $table->integer('security_deposit');
            $table->string('laundry_located', 50);
            $table->text('rent_description');
            $table->string('pet_policy', 50);
            $table->string('smoking_policy', 50);
            $table->string('lease_length', 50);
            $table->text('lease_terms');
            $table->string('rental_status', 50)->default('');
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('rentals');
    }
}
