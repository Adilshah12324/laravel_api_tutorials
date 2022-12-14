<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForiegnKeys;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableForiegnKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->disableForeignKeys();
//        $this->truncate('posts');
        Post::factory(3)->untitled()->create();
//        $this->enableForeignKeys();
    }
}
