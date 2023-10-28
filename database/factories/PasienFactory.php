<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'lahir' => $this->faker->date,
            'nik' => $this->faker->unique()->numerify('#############'),
            'kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'telepon' => $this->faker->phoneNumber,
            'layanan' => $this->faker->randomElement(['Poli Umum', 'Gigi', 'Mata']),
            'nomor_antrian' => $this->faker->numberBetween(1, 100),
        ];
    }
}
