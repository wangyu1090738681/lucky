<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article')->insert([
            ['article_name' => '传奇'],
            ['article_name' => '芒果'],
            ['article_name' => '哈密瓜']
        ]);
        DB::table('author')->insert([
            [
                'author_name' => '拼多多',
                'author_id' => rand(1, 3)
            ],
            [
                'author_name' => '支付宝',
                'author_id' => rand(1, 3)
            ]
        ]);
    }
}
