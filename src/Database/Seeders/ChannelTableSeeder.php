<?php

namespace marketplace\src\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hello')->delete();

        DB::table('hello')->insert([
            'id'         => 1,
            'name'       => 'Example',
        ]);
    }
}
