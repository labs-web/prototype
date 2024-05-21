<?php

namespace Database\Seeders\pkg_posts;

use App\Models\pkg_posts\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {        
        Post::find(2)->tags()->attach(1);
        Post::find(2)->tags()->attach(2);
        Post::find(3)->tags()->attach(3);
        Post::find(4)->tags()->attach(4);
        Post::find(5)->tags()->attach(5);
        Post::find(2)->tags()->attach(6);
        Post::find(4)->tags()->attach(7);
        Post::find(2)->tags()->attach(8);
    }
}