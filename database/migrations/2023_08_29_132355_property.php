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
        Schema::create('tbl_property', function (Blueprint $table) {
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
            $table->boolean('status')->default(false);
            $table->integer('created_by')->default(0);
            $table->datetime('created_date');
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
        Schema::dropIfExists('tbl_property');
    }
}
