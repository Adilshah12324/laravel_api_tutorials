<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForiegnKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
//        $this->truncate('users');
        $user = \App\Models\User::factory(10)->create();
//        $this->enableForeignKeys();
    }
}
