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
                'employee_unique_id' => 'EMP-0002',
                'employer_id'        => 1,
                'first_name'         => 'Brian',
                'middle_name'        => null,
                'last_name'          => 'Lopez',
                'email'              => 'brian@example.com',
                'role'               => 'Accountant',
                'hired_at'           => now(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'employee_unique_id' => 'EMP-0003',
                'employer_id'        => 1,
                'first_name'         => 'Carla',
                'middle_name'        => 'D',
                'last_name'          => 'Jimenez',
                'email'              => 'carla@example.com',
                'role'               => 'HR Staff',
                'hired_at'           => now(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
        ]);

    }
}
