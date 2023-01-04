<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cours = \App\Models\Cours::pluck('id')->toArray();

        return [
            'commentaire' => $this->faker->text(200),
            'date_creation'=> $this-> faker->date
        ];
    }
}
