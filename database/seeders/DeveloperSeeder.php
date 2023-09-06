<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developerNames = [
            'Urban Capital',
            'Riocan Real Estate Investment Trust',
            'LIV Communities',
            'National Homes',
            'Sunray Group Developments',
            'The Daniels Corporation',
            'TAS',
            'Rise Developments',
            'Lindvest Properties Limited',
            'Tenblock Developments',
            'Empire Communities',
            'Tridel',
            'Momentum Developments',
            'Stinson Properties Inc',
            'HIP Developments',
            'Harlo Capital',
            'Curated Properties',
            'The Sher Corporation',
            'Great Gulf',
            'Branthaven Homes',
            'Diamond Corp',
            'Lamb Development Corp.',
            'Canlight Realty',
            'Core Development',
            'Townwood Homes Inc.',
            'DECO Homes',
            'Gala Developments',
            'Digreen Homes',
            'Maplebrook Homes',
            'Matrix Development Group',
        ];

        foreach ($developerNames as $name) {
            DB::table('developers')->insert([
                'developer_name' => $name,
                'is_main' => 1
            ]);
        }
    }
}
