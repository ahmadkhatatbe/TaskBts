<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate sample data for the employees table
        for ($i = 1; $i <= 50; $i++) {
            DB::table('employees')->insert([
                'firstName' => 'FirstName' . $i,
                'lastName' => 'LastName' . $i,
                'email' => 'Email' . $i . '@example.com',
                'phone' => '123-456-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'company_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
