<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDateTime = Carbon::now();

        $countries = [
            [
                'id' => 1,
                'country_name' => 'Canada',
                'is_main' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_date' => $currentDateTime,
            ],
            [
                'id' => 2,
                'country_name' => 'New Jersey',
                'is_main' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_date' => $currentDateTime,
            ],
            [
                'id' => 3,
                'country_name' => 'England',
                'is_main' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_date' => $currentDateTime,
            ],
            [
                'id' => 4,
                'country_name' => 'Colorado',
                'is_main' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_date' => $currentDateTime,
            ],
        ];

        DB::table('countries')->insert($countries);
    }
}
