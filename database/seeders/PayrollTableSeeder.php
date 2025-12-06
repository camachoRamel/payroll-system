<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayrollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payroll_records')->insert([
            [
                'employee_id' => 1,
                'period' => '2025/2',
                'allowance' => 1500,
                'deductions' => 1000,
                'net_salary' => 28500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'period' => '2025/1',
                'allowance' => 2500,
                'deductions' => 2000,
                'net_salary' => 35500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
