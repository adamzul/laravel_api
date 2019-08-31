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
        //
        Article::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'user' => 1,
                'title' => $faker->realText($maxNbChars = 50),
                'body' => $faker->realText($maxNbChars = 200),
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'user' => 2,
                'title' => $faker->realText($maxNbChars = 50),
                'body' => $faker->realText($maxNbChars = 200),
            ]);
        }
    }
}
