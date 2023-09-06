<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_agents')->insert([
            [
                'id' => 1,
                'city_id' => 1,
                'agent_name' => 'TAHIR MANGATT',
                'agent_image' => 'tahir-mangatt.png',
                'agent_contact_no' => '+1 (647) 699-6675',
                'agent_address' => 'Property Agent',
                'agent_email' => 'admin@torontocondomania.ca',
                'agent_website' => 'http://g5plus.net',
                'agent_agency' => 'The Label Market',
                'agent_company' => 'Property Agent Company',
                'company_phone_no' => '400 500 6000',
                'company_address' => 'Property Agent'
            ],
        ]);
    }
}
