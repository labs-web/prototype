<?php

namespace Database\Seeders\pkg_posts;

use App\Models\pkg_posts\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_posts/tags.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                if (isset($data[0]) && isset($data[1])) {
                    Tag::create([
                        "nom" => $data[0],
                        "description" => $data[1]
                    ]);
                }
            }
            $firstline = false;
        }
    }
}
