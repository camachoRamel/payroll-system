<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'middle_name' => 'A',
                'last_name'  => 'Doe',
                'username'   => 'admin',
                'role'       => 1,
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Maria',
                'middle_name' => 'B',
                'last_name'  => 'Santos',
                'username'   => 'employee1',
                'role'       => 0,
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Alex',
                'middle_name' => 'C',
                'last_name'  => 'Tan',
                'username'   => 'employee2',
                'role'       => 0,
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
