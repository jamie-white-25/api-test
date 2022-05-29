<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name' => 'director',
            ],
            [
                'name' => 'development',
            ],
            [
                'name' => 'HR department',
            ],
            [
                'name' => 'sales department',
            ],
            [
                'name' => 'accounting department',
            ],
        ]);
    }
}
