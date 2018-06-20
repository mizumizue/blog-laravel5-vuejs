<?php

use Illuminate\Database\Seeder;
use Cake\I18n\Time;

use App\Models\Article;
use App\Models\Tag;

class ArticleTagTableSeeder extends Seeder
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
        $tags = Tag::all();
        $articles = Article::all();
        $articleTag = [];
        foreach ($articles as $article) {
            foreach ($tags as $tag) {
                // Titleにタグ名が含まれていたら関連付けする.
                if (mb_stripos($article->title, $tag->title) === false) {
                    continue;
                }
                $articleTag[] = [
                    'id' => $faker->uuid,
                    'article_id' => $article->id,
                    'tag_id' => $tag->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        DB::table('article_tag')->insert($articleTag);
    }
}
