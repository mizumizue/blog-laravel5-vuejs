<?php

use Illuminate\Database\Seeder;
use Cake\Chronos\Chronos;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Chronos::now();
        DB::table('users')->insert(
            [
                'name' => 'system',
                'email' => 'system'.'@example.com',
                'password' => bcrypt('secret'),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
    }
}
