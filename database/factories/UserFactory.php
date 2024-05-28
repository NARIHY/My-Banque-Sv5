<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jour = rand(1, 27); // Jour aléatoire entre 1 et 27$dateCreation = date('d m Y', strtotime("$annee-$mois-$jour")); // Formatage de la date au format "jour mois année"

        return [
            'last_name' => fake()->firstName(),
            'username' =>  fake()->userName(),
            'password' => Hash::make('12345678'),
            'birthday' => fake()->date(),
            'name' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role_id' => '1',
            'created_at' => strtotime('08/03/2024'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
