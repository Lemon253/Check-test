<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//追加
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //追加するパラメータの詳細
        $param = [
            'id' => 1,
            'content' => '商品のお届けについて'
        ];
        //パラメータの挿入
        DB::table('categories')->insert($param);
        $param = [
            'id' => 2,
            'content' => '商品の交換について'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'id' => 3,
            'content' => '商品トラブル'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'id' => 4,
            'content' => 'ショップへのお問い合わせ'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'id' => 5,
            'content' => 'その他'
        ];
        DB::table('categories')->insert($param);
    }
}
