<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //postsテーブルをtruncate
        DB::table('posts')->truncate();
        //ダミーデータを生成
        factory(App\Post::class, 100)->create();
    }
}
