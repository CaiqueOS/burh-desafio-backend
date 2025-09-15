<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empresa;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaga>
 */
class VagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empresa_id' => Empresa::factory(),
            'titulo' => fake()->jobTitle(),
            'descricao' => fake()->paragraph(),
            'tipo' => fake()->randomElement(['PJ', 'CLT', 'E']),
            'salario' => fake()->randomFloat(2, 3000, 15000)
        ];
    }
}
