<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // posts テーブルにデータを挿入
        DB::table('posts')->insert([
            'title' => '命名の心得',
            'body' => '命名はデータを基準に考える',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 他にも必要なデータを挿入する場合はここに追加する
    }
}
