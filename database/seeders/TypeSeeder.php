<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['HTML', 'CSS', 'JavaScript', 'VueJs', 'Front End', 'PHP', 'MySQL', 'Laravel', 'Back End', 'Full Stack'];
        foreach ($types as $type) {
            $newType = new Type();
            $newType->type = $type;
            $newType->slug = Str::slug($newType->type);
            $newType->save();
        }
    }
}
