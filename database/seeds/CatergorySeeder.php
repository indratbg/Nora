<?php

use Illuminate\Database\Seeder;

class CatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_id1' => 'article',
            'category_id2' => '001',
            'category_id2' => '',
            'category_name'=>'Tips',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'article',
            'category_id2' => '002',
            'category_id2' => '',
            'category_name'=>'Product Review',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '001',
            'category_id2' => '',
            'category_name'=>'Product Review',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
