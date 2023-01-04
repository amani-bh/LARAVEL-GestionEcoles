<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre_event' => $this->faker->text(20),
            'date_debut'=> $this->faker->date,
            'date_fin'=> $this->faker->date,
            'place'=>$this->faker->text(20),
            'description'=>$this->faker->text(300),
            'createur'=>$this->faker->text(25)
        ];
    }
}
