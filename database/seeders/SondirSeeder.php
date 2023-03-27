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
            'lat' => 0.236326556,
            'lng' => 100.66083411
        ]);
        sondir::create([
            'project_id' => 1,
            'number' => 2,
            'recommendation' => 1,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);

        // Project id = 2
        sondir::create([
            'project_id' => 2,
            'number' => 1,
            'recommendation' => 1,
            'lat' => 0.20079509,
            'lng' => 100.64745604

        ]);
        sondir::create([
            'project_id' => 2,
            'number' => 2,
            'recommendation' => 1,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
        // Project id = 3
        sondir::create([
            'project_id' => 3,
            'number' => 1,
            'recommendation' => 2,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
        sondir::create([
            'project_id' => 3,
            'number' => 2,
            'recommendation' => 2,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
        // Project id = 4
        sondir::create([
            'project_id' => 4,
            'number' => 1,
            'recommendation' => 2,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
        sondir::create([
            'project_id' => 4,
            'number' => 2,
            'recommendation' => 2,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
        // Project id = 5
        sondir::create([
            'project_id' => 5,
            'number' => 1,
            'recommendation' => 1,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
        sondir::create([
            'project_id' => 5,
            'number' => 2,
            'recommendation' => 1,
            'lat' => 0.20079509,
            'lng' => 100.64745604
        ]);
    }
}
