<?php

namespace Database\Seeders;

use App\Models\result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project id = 1 , Sondir 1
        result::create([
            'sondir_id' => 1,
            'depth' => 0,
            'nk' => 6,
            'hp' => 8,
            'jhp' => 0
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 0.2,
            'nk' => 10,
            'hp' => 12,
            'jhp' => 4
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 0.4,
            'nk' => 30,
            'hp' => 32,
            'jhp' => 8
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 0.6,
            'nk' => 20,
            'hp' => 22,
            'jhp' => 12
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 0.8,
            'nk' => 21,
            'hp' => 23,
            'jhp' => 16
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 1,
            'nk' => 21,
            'hp' => 23,
            'jhp' => 20
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 1.2,
            'nk' => 28,
            'hp' => 30,
            'jhp' => 24
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 1.4,
            'nk' => 7,
            'hp' => 9,
            'jhp' => 28
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 1.6,
            'nk' => 8,
            'hp' => 10,
            'jhp' => 32
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 1.8,
            'nk' => 9,
            'hp' => 11,
            'jhp' => 36
        ]);
        result::create([
            'sondir_id' => 1,
            'depth' => 1.8,
            'nk' => 9,
            'hp' => 11,
            'jhp' => 36
        ]);
        // Project id = 1 , Sondir 2
    }
}
