<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Professionist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfessionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0;");
        $professionists = config('tech_in_touch_seeder.professionists');

        foreach ($professionists as $professionist){
            $new_professionist = new Professionist();
            $new_professionist->user_id = $professionist['user_id'];
            $new_professionist->name = $professionist['name'];
            $new_professionist->surname = $professionist['surname'];
            $new_professionist->nickname = $professionist['nickname'];
            $new_professionist->slug = Professionist::generateSlug($new_professionist->name, $new_professionist->surname);
            $new_professionist->job_address = $professionist['job_address'];
            $new_professionist->profile_image = $professionist['profile_image'];
            $new_professionist->bio = $professionist['bio'];
            $new_professionist->linkedin = $professionist['linkedin_page'];
            $new_professionist->github = $professionist['github_page'];
            $new_professionist->avg_vote = $professionist['average_rate'];
            $new_professionist->phone_number = $professionist['phone_number'];
            $new_professionist->cv_path = $professionist['cv_path'];


            $new_professionist->save();
            DB::statement("SET foreign_key_checks = 1;");

        };
    }

    public static function storeimage($img)
    {
        $url =  $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}
