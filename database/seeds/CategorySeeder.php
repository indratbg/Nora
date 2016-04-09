<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            'category_id3' => '',
            'category_name'=>'Tips',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'article',
            'category_id2' => '002',
            'category_id3' => '',
            'category_name'=>'Product Review',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '001',
            'category_id3' => '',
            'category_name'=>'jewelry',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '002',
            'category_id3' => '',
            'category_name'=>'t-shirt',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '003',
            'category_id3' => '',
            'category_name'=>'dress',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '004',
            'category_id3' => '',
            'category_name'=>'necklace',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '005',
            'category_id3' => '',
            'category_name'=>'ring',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'category_id1' => 'product',
            'category_id2' => '006',
            'category_id3' => '',
            'category_name'=>'bracelet',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
