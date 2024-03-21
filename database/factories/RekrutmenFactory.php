<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rekrutmen>
 */
class RekrutmenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->unique()->numberBetween(1, 1000),
            'profile' => fake()->word,
            'nama' => fake()->name,
            'nik' => fake()->numerify('##############'),
            'nohp' => fake()->phoneNumber,
            'status' => fake()->randomElement(['Lolos', 'Tidak Lolos','']),
            'alamatktp' => fake()->address,
            'email' => fake()->unique()->safeEmail,
            'alamatdomisili' => fake()->address,
        ];
    }
}
