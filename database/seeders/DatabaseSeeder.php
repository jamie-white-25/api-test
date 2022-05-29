<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // create the default employee Julius Caesar
        $employee = \App\Models\Employee::factory(1)
            ->create([
                "full_name" => "Julius Caesar",
                "RFID" => "142594708f3a5a3ac2980914a0fc954f"
            ]);

        $this->call([
            DepartmentSeeder::class,
            BuildingSeeder::class,
            EmployeeSeeder::class
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
