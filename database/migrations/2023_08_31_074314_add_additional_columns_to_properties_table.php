<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property', function (Blueprint $table) {
            $table->dropColumn([
                'suites_starting_floor',
                'suites_per_floor',
                'floor_plans',
                'prop_price_from',
                'prop_price_to',
                'suite_size_from',
                'suite_size_to',
                'ceiling_height',
                'price_per_sqft_from',
                'price_per_sqft_to',
                'parking_price',
                'locker_price',
                'min_deposit_percentage',
                'no_of_beds',
                'no_of_baths',
            ]);
        });
    }
}
