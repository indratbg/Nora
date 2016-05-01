<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x=0;$x<100;$x++)
    	{
        DB::table('products')->insert([
            'id_product' => rand().'NECK',
            'product_name' => 'Necklace '.$x,
            'category'=>$x>20?'004':'001',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             'price'=>"120000+$x",
             'stock'=>"4+$x",
             'status'=>'active',
             'post_date_from'=>date('Y-m-d'),
             'post_date_to'=>date('Y-m-d'),
             'created_at'=>date('Y-m-d H:i:s'),
             'updated_at'=>date('Y-m-d H:i:s')
        ]);
		}

    }
}
