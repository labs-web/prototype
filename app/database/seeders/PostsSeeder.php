<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;



use Database\Seeders\pkg_posts\{
    TagsSeeder,
    PostSeeder,
    PostTagSeeder
};


class PostsSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(PostsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            TagsSeeder::class,
            PostSeeder::class,
            PostTagSeeder::class,
        ];
    }
}