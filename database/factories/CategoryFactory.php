<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Musique', 'Sport', 'Art et Culture', 'Cuisine', 'Éducation',
            'Bien-être', 'Technologie', 'Environnement', 'Famille', 'Social',
        'Santé', 'Voyage', 'Mode', 'Finance', 'Automobile', 'Maison & Jardin',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
