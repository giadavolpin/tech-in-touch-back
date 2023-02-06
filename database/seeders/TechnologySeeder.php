<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = config('tech_in_touch_seeder.technologies');

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology['name'];
            $new_technology->slug = Technology::generateSlug($new_technology['name']);
            $new_technology->icon = $technology['icon'];
            $new_technology->save();
        }
    }
}
