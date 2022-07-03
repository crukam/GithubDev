<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;
use App\Models\DeveloperRepository;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::factory()->times(10)->create()->each(function($developer){
            $repositories = DeveloperRepository::factory()->times(2)->make();
            $developer->repositories()->saveMany($repositories);
        });
    }
}
