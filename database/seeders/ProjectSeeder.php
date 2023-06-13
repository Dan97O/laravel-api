<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(3, true);
            $project->slug = Str::slug($project->title, '-');
            $project->cover_image = $faker->image('storage/app/public/placeholders/', fullPath:false, category:'Projects', word:$project->title);
            $project->content = $faker->paragraphs(asText:true);
            $project->site_link = $faker->url();
            $project->source_code = $faker->url();
            $project->date_time = $faker->date();
            $project->save();
        }
    }
}
