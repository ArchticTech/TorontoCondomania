<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArchitectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $architectNames = [
            'IBI Group',
            'Turner Fleischer Architects',
            'Graziani and Corazza Architects Inc',
            'Hunt Design Associates Inc.',
            'Teeple Architects',
            'Guthrie Muscovitch Architects',
            'Kirkor Architect Planners',
            'BDP Quadrangle',
            'Kirkor Architect Planners',
            'ABA Architects',
            'Martin Simmons Architects',
            'RAW Design',
            'KOHN PARTNERSHIP ARCHITECTS INC.',
            'Page Steele IBI Group Architects',
            'Giannone Petricone Associates Inc.',
            'RAW Development',
            'KNYMH Architects',
            'Sweeny & Co Architects',
            'Romanov Romanov Architects Inc',
            'AAA Architects',
            'KNYMH Inc.',
            'Onespace Architecture & Design',
            'Kirshenblatt Urban Architecture Inc.'
        ];

        foreach ($architectNames as $name) {
            DB::table('architects')->insert([
                'architects_name' => $name,
                'is_main' => 1,
                'status' => 1,
                'created_by' => 1,
            ]);
        }
    }
}
