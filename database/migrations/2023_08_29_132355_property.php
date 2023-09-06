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
            $table->string('prop_code', 200)->unique();
            $table->string('prop_name', 200);
            $table->text('prop_image');
            $table->integer('city_id');
            $table->integer('development_id')->default(0);
            $table->integer('developer_id')->default(0);
            $table->integer('architects_id')->default(0);
            $table->integer('interior_designer_id')->default(0);
            $table->integer('prop_agent_id')->default(0);
            $table->text('prop_address');
            $table->text('prop_iframe');
            $table->text('prop_meta_title')->nullable();
            $table->text('prop_meta_description')->nullable();
            $table->text('prop_meta_keywords')->nullable();
            $table->text('prop_meta_tags')->nullable();
            $table->string('prop_type', 100);
            $table->string('prop_status', 100);
            $table->integer('no_of_stories')->default(0);
            $table->integer('no_of_suites')->default(0);
            $table->string('est_occupancy_month', 100);
            $table->string('est_occupancy_year', 100);
            $table->date('vip_launch_date');
            $table->date('public_launch_date');
            $table->date('const_start_date');
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_vip')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_promotion')->default(false);
            $table->boolean('is_assignment')->default(false);
            $table->boolean('for_sale')->default(false);
            $table->boolean('for_rent')->default(false);
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
