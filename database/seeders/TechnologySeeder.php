<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'JavaScript', 'VueJs', 'PHP', 'MySQL', 'Laravel', 'SCSS', 'BootStrap', 'Vite'];
        foreach ($technologies as $techology) {
            $newTechology = new Technology();
            $newTechology->name = $techology;
            $newTechology->slug = Str::slug($newTechology->name);
            $newTechology->image = '';
            $newTechology->save();
        }
    }
}
