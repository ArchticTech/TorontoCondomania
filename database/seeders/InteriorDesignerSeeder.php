<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InteriorDesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interiorDesigners = [
            'Cecconi Simone',
            'Design Agency',
            'TACT Design',
            'Mason Studio',
            'II by IV Design',
            'Chapi Chapo Design',
            'Tomas Pearce Interior Design Consulting Inc.',
            'Truong Ly Design Inc.',
            'Baudit Interior Design',
            'Tomas Pearce Interior Design Consulting Inc.',
        ];

        foreach ($interiorDesigners as $name) {
            DB::table('interior_designers')->insert([
                'interior_designer_name' => $name,
                'is_main' => 1
            ]);
        }
    }
}
