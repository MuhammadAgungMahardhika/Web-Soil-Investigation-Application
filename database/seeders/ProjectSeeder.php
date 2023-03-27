<?php

namespace Database\Seeders;

use App\Models\project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        project::create([
            'name' => 'Pembangunan Mesjid Akbar',
            'location' => 'Balai Jaring, Kota Payakumbuh',
            'tester' => 'Zainal Efendi, ST',
            'approver' => 'Umar Khatab, ST, MT',
            'area_of_cone' => 10,
            'area_of_mandle' => 150,
        ]);
        project::create([
            'name' => 'Pengembangan Hotel Farabi',
            'location' => 'Jl.Sukarno Hatta Kel Balai Panjang Kota Payakumbuh',
            'tester' => 'Hendrianto ',
            'approver' => 'Umar Khatab, ST, MT',
            'area_of_cone' => 10,
            'area_of_mandle' => 150,
        ]);
        project::create([
            'name' => 'Pembangunan Mesjid Jamik',
            'location' => 'Jalan Sukarno Hatta Kota Payakumbuh',
            'tester' => 'Zainal Efendi, ST',
            'approver' => 'Umar Khatab, ST, MT',
            'area_of_cone' => 10,
            'area_of_mandle' => 150,
        ]);
        project::create([
            'name' => 'Pembangunan Mesjid Muttahidin Nagori Parambahan',
            'location' => 'Kota Payakumbuh',
            'tester' => 'Zainal Efendi, ST ',
            'approver' => 'Umar Khatab, ST, MT',
            'area_of_cone' => 10,
            'area_of_mandle' => 150,
        ]);
        project::create([
            'name' => 'Pembangunan Mesjid Nurul Jannah',
            'location' => 'Payolinyam, Kota Payakumbuh',
            'tester' => 'Zainal Efendi, ST ',
            'approver' => 'Umar Khatab, ST, MT',
            'area_of_cone' => 10,
            'area_of_mandle' => 150,
        ]);
    }
}
