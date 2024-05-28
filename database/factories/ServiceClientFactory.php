<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceClient>
 */
class ServiceClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = $this->faker->numberBetween(1, 500) ;
        return [
            'sujet_conversation' => fake()->sentence(),
            'introduction_lettre' => fake()->sentences(5, true),
            'contenu_lettre' => fake()->sentences(15, true),
            'conclusion_lettre' => fake()->sentences(5, true),
            'users_id' => $user,
            'created_at' => now(),
            'status' => '0'
        ];
    }
}
