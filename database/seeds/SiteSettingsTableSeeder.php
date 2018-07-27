<?php

use Illuminate\Database\Seeder;
use Cake\I18n\Time;

class SiteSettingsTableSeeder extends Seeder
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
        $siteSettings = [
            'id' => $faker->uuid,
            'url' => 'https://'.env('DOMAIN'),
            'title' => env('APP_NAME'),
            'description' => env('SITE_DESCRIPTION'),
            'domain' => env('DOMAIN'),
            'author' => env('AUTHOR'),
            'email' => env('AUTHOR_EMAIL'),
            'image' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('site_settings')->insert($siteSettings);
    }
}
