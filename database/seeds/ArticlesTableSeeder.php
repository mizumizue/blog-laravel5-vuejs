<?php

use Illuminate\Database\Seeder;
use Cake\I18n\FrozenTime;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Test Article Titles
     */
    public static $articleTitles = [
        'PHPでの配列操作',
        'Linuxでよく使うコマンド',
        'LaravelでMigration, Seederを使う',
        'CakePHP3ルーティング',
        'Vue.jsでSPNなアプリケーションを作る',
        'ApacheのVirtualHost設定',
        'VSCode + VagrantでXDebug導入',
        'MySQL5.7初期パスワード変更',
        'PHPからJavaScriptへのデータ受け渡し方法',
        'CakePHPでCSSが反映されない時の対処法',
        'Laravel5.6ルーティング',
        'Vue.jsルーティング',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        $now = FrozenTime::now();
        shuffle(ArticlesTableSeeder::$articleTitles);
        $articles = [];
        for ($i=0; $i < 10; $i++) {
            $subDays = mt_rand(0, 365 * 5);
            $time = $now->modify("-${subDays} days");
            $articles[] = [
                'id' => $faker->uuid,
                'code' => $faker->uuid,
                'title' => ArticlesTableSeeder::$articleTitles[$i],
                'description' => ArticlesTableSeeder::$articleTitles[$i],
                'created_at' => $time,
                'updated_at' => $time,
            ];
        }
        DB::table('articles')->insert($articles);
    }
}
