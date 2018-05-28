<?php

use Illuminate\Database\Seeder;
use Cake\I18n\Time;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        $now = Time::now();
        $articles = [];
        for ($i=0; $i < 10; $i++) {
            $articles[] = [
                'id' => $faker->uuid,
                'title' => $faker->company,
                'content' => $faker->realText,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('articles')->insert($articles);
    }
}
