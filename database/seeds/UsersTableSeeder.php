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
        $systemUser = [
            'id' => $faker->uuid,
            'name' => 'system',
            'email' => env('SYSTEM_USER_EMAIL'),
            'password' => bcrypt(env('SYSTEM_USER_PASS')),
            'api_token' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($systemUser);
    }
}
