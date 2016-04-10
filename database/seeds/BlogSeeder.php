<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($x=0;$x<50;$x++)
    	{
            $category = $x>20?'001':'002';
        DB::table('blogs')->insert([
            'title' => str_random(10),
            'subtitle' => str_random(10).'@gmail.com',
            'category'=>$category,
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
           'status'=>'A',
            'post_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
		}
    }
}
