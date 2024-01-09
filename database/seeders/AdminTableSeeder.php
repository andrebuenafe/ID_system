<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = DB::table('roles')->where('name', 'admin')->first();

        // Create an admin user and associate it with the "admin" role
        DB::table('users')->insert([
            'name' => 'Admin Doe',
            'email' => 'Admin@example.com',
            'role' => 1,
            'password' => Hash::make('admin123'),

        ]);

    }
}
