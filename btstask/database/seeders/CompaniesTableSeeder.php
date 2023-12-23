<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate sample data for the companies table
       
            DB::table('companies')->insert([
                'name' => 'Company ' . 1,
                'email' => 'company' . 1 . '@example.com',
                'logo' => 'uploads/1703352721v550jI37gV.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
       
    }
}