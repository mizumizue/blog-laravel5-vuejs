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
                'color_code' => '8992BC',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'CakePHP',
                'color_code' => 'C44849',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Laravel',
                'color_code' => 'E25C4E',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Apache',
                'color_code' => 'C23531',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Linux',
                'color_code' => '000000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'MySQL',
                'color_code' => 'FFFFFF',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Vagrant',
                'color_code' => '4784B4',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        DB::table('tags')->insert($tags);
    }
}
