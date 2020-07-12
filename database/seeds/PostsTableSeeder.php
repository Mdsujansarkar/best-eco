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
        \App\Post::create([
        	'user_id' => 1,
        	'category_id' => 1,
        	'title' => 'Album example',
        	'content' => 'Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks dont simply skip over it entirely.',
        	'thumbnail_path' => 'kfdslkf.png'
        ]);
    }
}
