<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Buildings to seed, name, location, department id
        $buildings = collect([
            [
                'Isaac Newton',
                'UK',
                [2, 5]
            ],
            [
                'Oscar Wilde',
                'UK',
                [3, 4]
            ],
            [
                'Charles Darwin',
                'UK',
                [1, 2, 3, 4, 5]
            ],
            [
                'Benjamin Franklin',
                'USA',
                [2, 4]
            ],
            [
                'Luciano Pavarotti',
                'Italy',
                [2, 4]
            ],
        ]);


        $buildings->eachSpread(function ($name, $location, $department_ids) {
            $building = Building::create(['name' => $name, 'location' => $location]);
            $building->departments()->sync($department_ids);
        });
    }
}
