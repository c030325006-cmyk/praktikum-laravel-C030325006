<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matakuliah>
 */
class MatakuliahFactory extends Factory
{
    protected $model = Matakuliah::class;

    public function definition(): array
    {
        return [
            'kode_mk' => 'MK' . fake()->unique()->numerify('###'),
            'nama_mk' => fake()->randomElement([
                'Pemrograman Web',
                'Basis Data',
                'Jaringan Komputer',
                'Rekayasa Perangkat Lunak',
                'Algoritma dan Pemrograman',
                'Sistem Operasi',
                'Keamanan Komputer',
                'Pemrograman Mobile',
                'Internet of Things',
                'Kecerdasan Buatan',
            ]),
            'sks' => fake()->numberBetween(1, 4),
            'semester' => fake()->numberBetween(1, 8),
            'dosen_id' => User::factory(),
        ];
    }
}