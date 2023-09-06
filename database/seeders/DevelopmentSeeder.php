<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developmentNames = [
            'Rogers Real Estate Development Limited',
            'Riocan Real Estate Investment Trust',
            'LIV Communities',
            'National Homes',
            'Sunray Group Developments',
            'The Daniels Corporation',
            'Gairloch Developments',
            'Phantom Developments',
            'Kilmer Group',
            'Freed Developments',
            'Bazis Inc',
            'Minto Group Inc',
            'Menkes Developments Ltd.',
            'Alterra Group',
            'Coletara Development',
            'Rosehaven Homes Limited',
            'Sundance Development Corporation',
            'Opus Homes',
            'Treasure Hill Home Corp',
            'Isroc International',
            'CTN Developments',
            'Stateview Homes',
            'Homes by DeSantis',
            'Build Up Development Co',
            'Matrix Development Group'
        ];

        foreach ($developmentNames as $developmentName) {
            DB::table('developments')->insert([
                'development_name' => $developmentName,
                'is_main' => 1
            ]);
        }
    }
}
