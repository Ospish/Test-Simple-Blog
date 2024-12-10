<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Article::factory(20)->has(Comment::factory(rand(1,3)))->create();

        Tag::factory(8)->create();

        $data = [];
        for ($i = 1; $i < 21; $i++) {
            $data[] = [
                'article_id'    => $i,
                'tag_id'     => rand(1, 8),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        for ($i = 1; $i < 11; $i++) {
            $data[] = [
                'article_id'    => rand(1, 20),
                'tag_id'     => rand(1, 8),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        DB::table('article_tag')->insert($data);
    }
}
