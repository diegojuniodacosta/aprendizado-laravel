<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'ano_fabricacao' => '2020',
                'cor' => 'Branco',
                'preco' => 85000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'ano_fabricacao' => '2019',
                'cor' => 'Preto',
                'preco' => 90000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marca' => 'Ford',
                'modelo' => 'Focus',
                'ano_fabricacao' => '2018',
                'cor' => 'Azul',
                'preco' => 75000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
