<?php

namespace Database\Factories;

use App\Models\TipoEvento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoEvento>
 */
class TipoEventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TipoEvento::class;
    public function definition(): array
    {
        return [
            'name'=>$this->faker->sentence()
        ];
    }
}
