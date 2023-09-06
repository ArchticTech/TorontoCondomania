<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArchitectSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DeveloperSeeder::class);
        $this->call(DevelopmentSeeder::class);
        $this->call(InteriorDesignerSeeder::class);
        $this->call(PropertyAgentSeeder::class);
    }
}
