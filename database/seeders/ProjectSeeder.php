<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        
        $types = Type::all();
        $type_ids = $types->pluck('id')->all();
        
        //Abbreviata
        $technology_ids = Technology::all()->pluck('id')->all();

        for($i = 0; $i < 20; $i++){
            
            $project = new Project();

            $title = $faker->sentence(5);
            $project -> title = $title;
            $project -> slug = Str::slug($title);
            $project -> description = $faker->text(200);
            $project -> starting_date = $faker->dateTime();
            $project -> link = $faker->url();
            $project -> type_id = $faker->optional()->randomElement($type_ids);

            $project->save();

            $random_technology_ids = $faker->randomElements($technology_ids, null);
            $project->technologies()->attach($random_technology_ids);

        }
    }
}
