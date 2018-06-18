<?php

use Illuminate\Database\Seeder;
use Cake\I18n\Time;

class TagsTableSeeder extends Seeder
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
        $tags = [
            [
                'id' => $faker->uuid,
                'title' => 'PHP',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => '8992BC',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'CakePHP',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => 'C44849',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Laravel',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => 'E25C4E',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Apache',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => 'C23531',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Linux',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => '000000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'MySQL',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => '000000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Vagrant',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => '4784B4',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Vue.js',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => '62B587',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'JavaScript',
                'font_color_code' => 'FFFFFF',
                'background_color_code' => 'F1DB6B',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        DB::table('tags')->insert($tags);
    }
}
