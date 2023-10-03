<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Property extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->index('slug');
            $table->string('prop_code', 200)->unique();
            $table->string('prop_name', 200);
            $table->text('prop_image');
            $table->text('description');
            $table->integer('city_id');
            $table->integer('development_id')->default(0);
            $table->integer('developer_id')->default(0);
            $table->integer('architects_id')->default(0);
            $table->integer('interior_designer_id')->default(0);
            $table->integer('prop_agent_id')->default(0);
            $table->text('prop_address');
            $table->text('prop_meta_title')->nullable();
            $table->text('prop_meta_description')->nullable();
            $table->text('prop_meta_keywords')->nullable();
            $table->text('prop_meta_tags')->nullable();
            $table->enum('prop_type', ['Condo', 'Townhouse', 'Condo Townhomes', 'Single Family']);
            $table->enum('prop_status', ['Pre-Construction', 'Under-Construction', 'Ready to move']);
            $table->integer('no_of_stories')->default(0);
            $table->integer('no_of_suites')->default(0);
            $table->string('est_occupancy_month', 100);
            $table->string('est_occupancy_year', 100);
            $table->date('vip_launch_date');
            $table->date('public_launch_date');
            $table->date('const_start_date');
            $table->enum('vip_featured_promotion', ['Vip', 'Featured', 'Promotion']);
            $table->enum('sale_rent', ['Sale', 'Rent']);
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_assignment')->default(false);
            $table->boolean('sold_out')->default(false);

            $table->integer('suites_starting_floor')->default(0);
            $table->integer('suites_per_floor')->default(0);
            $table->integer('floor_plans')->default(0);
            $table->integer('prop_price_from')->default(0);
            $table->integer('prop_price_to')->default(0);
            $table->integer('suite_size_from')->default(0);
            $table->integer('suite_size_to')->default(0);
            $table->integer('ceiling_height')->default(0);
            $table->integer('price_per_sqft_from')->default(0);
            $table->integer('price_per_sqft_to')->default(0);
            $table->integer('parking_price')->default(0);
            $table->integer('locker_price')->default(0);
            $table->integer('min_deposit_percentage')->default(0);
            $table->integer('no_of_beds')->default(0);
            $table->integer('no_of_baths')->default(0);

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

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
        Schema::dropIfExists('property');
    }
}
