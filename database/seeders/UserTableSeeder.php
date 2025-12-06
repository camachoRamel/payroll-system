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
                'last_name' => 'Doe',
                'username' => 'admin',
                'role' => 1,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Brian',
                'middle_name' => null,
                'last_name' => 'Lopez',
                'username' => 'Lopez',
                'role' => 0,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Carla',
                'middle_name' => 'D',
                'last_name' => 'Jimenez',
                'username' => 'Jimenez',
                'role' => 0,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
