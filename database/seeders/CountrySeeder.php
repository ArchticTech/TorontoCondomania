<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'id' => 1,
                'country_name' => 'Canada',
                'is_main' => 1
            ],
            [
                'id' => 2,
                'country_name' => 'New Jersey',
                'is_main' => 1
            ],
            [
                'id' => 3,
                'country_name' => 'England',
                'is_main' => 1
            ],
            [
                'id' => 4,
                'country_name' => 'Colorado',
                'is_main' => 1
            ],
        ];

        DB::table('countries')->insert($countries);
    }
}
