<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->sentence(),
            'dni'=>$this->faker->randomNumber(8),
            'email'=>$this->faker->email(),
            'sueldo'=>$this->faker->numerify('####'),
            'telefono'=>$this->faker->numerify('#########'),
            'password'=>$this->faker->password(),
            'direccion'=>$this->faker->paragraph(),
            'cargo'=>$this->faker->randomElement(['administrador', 'profesor'])
        ];
    }
}
