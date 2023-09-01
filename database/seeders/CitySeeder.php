<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = Carbon::now();
        
        $cityNames = [
            'Brampton', 'Oshawa', 'Markham', 'Oakville', 'Richmond Hill', 'Burlington', 'Halton Hills', 'Caledon',
            'Clarington', 'Whitchurch-Stouffville', 'Whitby', 'Ajax', 'Regional municipality', 'East Gwillimbury',
            'Uxbridge', 'Scugog', 'Brock', 'Georgina', 'York', 'Schomberg', 'East York Town', 'Keelesdale-Eglinton West',
            'Rouge', 'Malvern', 'Alexandra Park', 'Parkdale', 'High Park North', 'Dovercourt Village', 'Old Toronto',
            'Thorold', 'Bradford West Gwillimbury', 'Stouffville', 'Grimsby', 'New Tecumseth', 'Scarborough', 'Cambridge',
            'Tecumseth', 'Newcastle', 'Innisfil', 'Lindsay'
        ];
        $cityNamesMain = [
            'Toronto', 'Mississauga', 'Vaughan', 'Pickering', 'Milton', 'East Gwillimbury', 'King City', 'Aurora',
            'New Tecumseth', 'Brantford', 'Barrie', 'Kitchener', 'Hamilton', 'Niagara Falls', 'Newmarket', 'Caledonia',
            'King City', 'Oakville'
        ];
        
        $cities = [];
        
        foreach ($cityNamesMain as $cityNameMain) {
            $cities[] = [
                'country_id' => 1,
                'city_name' => $cityNameMain,
                'is_main' => 1,
                'for_header' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_date' => $currentDate,
            ];
        }
        foreach ($cityNames as $cityName) {
            $cities[] = [
                'country_id' => 1,
                'city_name' => $cityName,
                'is_main' => 0,
                'for_header' => 1,
                'status' => 1,
                'created_by' => 1,
                'created_date' => $currentDate,
            ];
        }
        
        DB::table('cities')->insert($cities);
    }
}
