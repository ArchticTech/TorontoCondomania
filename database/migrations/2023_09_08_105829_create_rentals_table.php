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
            $table->text('description');
            $table->text('image');

            $table->text('address');
            $table->integer('city_id');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->enum('type', ['Condo', 'Townhouse', 'Condo Townhomes', 'Single Family']);
            $table->integer('beds')->default(0);
            $table->integer('baths')->default(0);
            $table->integer('sqft')->default(0);

            $table->date('availability_date');
            $table->integer('monthly_rent');
            $table->integer('security_deposit');

            $table->boolean('basement_available')->default(false);
            $table->boolean('parking_available')->default(false);
            $table->boolean('laundry_located')->default(false);
            $table->boolean('smoking_policy')->default(false);
            $table->boolean('pet_policy')->default(true);

            $table->boolean('status')->default(true);
            
            $table->integer('created_by')->default(1);
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
