<?php

use Illuminate\Database\Seeder;
use Cake\I18n\Time;

class UsersTableSeeder extends Seeder
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
        $testUsers = [];
        for ($i = 0; $i < 10; $i++) {
            $testUsers[] = [
                'id' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('users')->insert($testUsers);
    }
}
