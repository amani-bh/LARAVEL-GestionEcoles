<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Etablissement>
 */
class EtablissementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'adress' => $this->faker->text(20),
            'nmbrmax' => $this->faker->int,
            'email' => $this->faker->text(20),
            'tel' => $this->faker->text(20)
        ];
    }
}
