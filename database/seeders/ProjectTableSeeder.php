<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $types = Type::all();
        // $types->each(function ($type) {

        //     $project = Project::factory()->make();
        //     $project->type()->associate($type);

        //     $project->save();
        // });
        Project::factory()
            ->count(50)
            ->make()
            ->each(function ($project) {

                $type = Type::inRandomOrder()->first();
                $project->type()->associate($type);

                $project->save();
            });
    }
}
