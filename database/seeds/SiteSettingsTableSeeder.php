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
            'url' => 'http://takeiteasy.localhost.com',
            'title' => 'take IT easy',
            'description' => 'むせきにんなぎじゅつぶろぐです',
            'domain' => 'takeiteasy.localhost.com',
            'author' => 'Kenta Mizushima',
            'image' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('site_settings')->insert($siteSettings);
    }
}
