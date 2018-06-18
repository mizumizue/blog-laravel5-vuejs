<?php

use Illuminate\Database\Seeder;
use Cake\I18n\Time;

class NaviMenusTableSeeder extends Seeder
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
        $naviMenus = [
            [
                'id' => $faker->uuid,
                'title' => 'Home',
                'code' => '',
                'order' => 1,
                'visible' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Menus',
                'code' => 'menus',
                'order' => 2,
                'visible' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Articles',
                'code' => 'articles',
                'order' => 3,
                'visible' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Images',
                'code' => 'images',
                'order' => 4,
                'visible' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => $faker->uuid,
                'title' => 'Users',
                'code' => 'users',
                'order' => 5,
                'visible' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        DB::table('navi_menus')->insert($naviMenus);
    }
}
