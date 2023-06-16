<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $projects = config("db.projects");

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->cover_image = $project['cover_image'];
            $newProject->content = $project['content'];
            $newProject->site_link = $project['site_link'];
            $newProject->source_code = $project['source_code'];
            $newProject->date_time = $project['date_time'];
            $newProject->save();
        }

    }
}

/*    for ($i = 0; $i < 10; $i++) {
$project = new Project();
$project->title = $faker->words(3, true);
$project->slug = Str::slug($project->title, '-');
$project->cover_image = 'placeholders/' . $faker->image('storage/app/public/placeholders/', fullPath:false, category:'Projects', word:$project->title);
$project->content = $faker->paragraphs(asText:true);
$project->site_link = $faker->url();
$project->source_code = $faker->url();
$project->date_time = $faker->date();
$project->save();
} */
