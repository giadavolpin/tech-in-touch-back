<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;



class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0;");
        Project::truncate();

        $projects = config('tech_in_touch_seeder.projects');

        foreach ($projects as $project) {
            $new_project = new Project();
            $new_project->name = $project['name'];
            $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->description = $project['description'];
            $new_project->cover_image = $project['cover_image'];
            $new_project->professionist_id = $project['professionist_id'];
            $new_project->save();

            DB::statement("SET foreign_key_checks = 1;");
        }
    }
}
