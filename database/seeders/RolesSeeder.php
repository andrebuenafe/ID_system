<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
       ['name' => 'admin'],
       ['name' => 'staff'],

        ];
        DB::table('roles')->insert($roles);
    }
}

