<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name_department' => 'IT'],
            ['name_department' => 'HR'],
            ['name_department' => 'Finance'],
            // Add more departments as needed
        ]);
    }
}

