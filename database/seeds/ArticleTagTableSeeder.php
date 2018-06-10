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
        $tagIds = Tag::pluck('id')->toArray();
        $tagCount = count($tagIds);
        [$min, $max] = [1, 4];
        $max = ($max > $tagCount) ? $tagCount : $max;
        $articles = Article::all();
        $articleTag = [];
        foreach ($articles as $article) {
            // ランダムにタグ抽出して、複数登録
            $randNum = mt_rand($min, $max);
            $extractedTagkeys = array_rand($tagIds, $randNum);
            if (is_integer($extractedTagkeys)) {
                $extractedTagkeys = [$extractedTagkeys];
            }
            foreach ($extractedTagkeys as $key) {
                $articleTag[] = [
                    'id' => $faker->uuid,
                    'article_id' => $article->id,
                    'tag_id' => $tagIds[$key],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        DB::table('article_tag')->insert($articleTag);
    }
}
