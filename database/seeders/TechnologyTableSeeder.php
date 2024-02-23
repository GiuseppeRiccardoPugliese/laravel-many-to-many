<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology::factory()
            ->count(10)
            ->create()
            ->each(function ($technology) {

                $projects = Project::inRandomOrder()->limit(3)->get();
                $technology->projects()->attach($projects);
                $technology->save();
            });
    }
}
