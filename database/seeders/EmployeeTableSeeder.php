<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('employees')->insert([
            [
                'employer_id'        => 1,
                'first_name'         => 'Brian',
                'middle_name'        => null,
                'last_name'          => 'Lopez',
                'email'              => 'brian@example.com',
                'position'               => 'Accountant',
                'base_salary'        => 10000,
                'hired_at'           => now(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'employer_id'        => 1,
                'first_name'         => 'Carla',
                'middle_name'        => 'D',
                'last_name'          => 'Jimenez',
                'email'              => 'carla@example.com',
                'position'               => 'HR Staff',
                'base_salary'        => 100.10,
                'hired_at'           => now(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
        ]);

    }
}
