<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cours>
 */
class CoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(20),
           'title'=> $this->faker->text(20),
            'description'=> $this->faker->text(200),
            'category'=> $this->faker->text(20),
            'courseVideo'=> $this->faker->text(50),
            'courseImage'=> $this->faker->text(50),
            'details'=> $this->faker->text(50),
            'file'=> $this->faker->text(50),
            'duree'=> $this->faker->text(20)

        ];
    }
}
