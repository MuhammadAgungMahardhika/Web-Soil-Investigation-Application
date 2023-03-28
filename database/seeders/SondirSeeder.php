<?php

namespace Database\Seeders;

use App\Models\sondir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SondirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project id = 1
        sondir::create([
            'project_id' => 1,
            'number' => 1,
            'recommendation' => 1,
            'lat' => -0.23632656,
            'lng' => 100.66083411
        ]);
        sondir::create([
            'project_id' => 1,
            'number' => 2,
            'recommendation' => 1,
            'lat' => -0.20079509,
            'lng' => 100.64745604
        ]);

        // Project id = 2
        sondir::create([
            'project_id' => 2,
            'number' => 1,
            'recommendation' => 1,
            'lat' => -0.2598068,
            'lng' => 100.6040524

        ]);
        sondir::create([
            'project_id' => 2,
            'number' => 2,
            'recommendation' => 1,
            'lat' => -0.260145,
            'lng' => 100.606263
        ]);
        // Project id = 3
        sondir::create([
            'project_id' => 3,
            'number' => 1,
            'recommendation' => 2,
            'lat' => -0.2255399,
            'lng' => 100.6295271
        ]);
        sondir::create([
            'project_id' => 3,
            'number' => 2,
            'recommendation' => 2,
            'lat' => -0.2251395,
            'lng' => 100.629573
        ]);
        // Project id = 4
        sondir::create([
            'project_id' => 4,
            'number' => 1,
            'recommendation' => 2,
            'lat' => -0.206004,
            'lng' => 100.6053163
        ]);
        sondir::create([
            'project_id' => 4,
            'number' => 2,
            'recommendation' => 2,
            'lat' => -0.206024,
            'lng' => 100.6053556
        ]);
        // Project id = 5
        sondir::create([
            'project_id' => 5,
            'number' => 1,
            'recommendation' => 1,
            'lat' => -0.2028913,
            'lng' => 100.6437630
        ]);
        sondir::create([
            'project_id' => 5,
            'number' => 2,
            'recommendation' => 1,
            'lat' => -0.20079509,
            'lng' => 100.64745604
        ]);
    }
}
