<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate the existing record
        Article::truncate();

        $faker = \Faker\Factory::create();

        //Seeding a few articles
        for($i = 0; $i<50; $i++){
            Article::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph
            ]);
        }
    }
}
