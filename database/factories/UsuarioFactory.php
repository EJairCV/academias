<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
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
            'dni'=>$this->faker->randomNumber(7),
            'email'=>$this->faker->email(),
            'edad'=>$this->faker->randomNumber(2),
            'telefono'=>$this->faker->numerify('#########'),
            'password'=>$this->faker->password(),
            'direccion'=>$this->faker->paragraph(),
        ];
    }
}
