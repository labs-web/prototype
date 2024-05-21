<?php

namespace Database\Seeders\pkg_posts;

use App\Models\pkg_posts\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_posts/posts.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                if (isset($data[0]) && isset($data[1])) {
                    Post::create([
                        "nom" => $data[0],
                        "description" => $data[1]
                    ]);
                }
            }
            $firstline = false;
        }
    }
}
