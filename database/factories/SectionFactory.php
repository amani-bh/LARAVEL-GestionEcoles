<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
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
            'name' => $this->faker->text(200),
            'details' => $this->faker->text(200),
            'file' => $this->faker->text(200)
        ];
    }
}
