<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompteBancaire>
 */
class CompteBancaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cin = $this->faker->numberBetween(100000000000, 609999999999) ;
        $user = $this->faker->numberBetween(1, 501) ;
        $compte_categorie = $this->faker->numberBetween(1, 4) ;
        $status_compte = $this->faker->numberBetween(1, 3) ;
        $numero_compte = $this->faker->numberBetween(10000000000000,99999999999999);
        return [
            'cin' => $cin,
            'code_secret' => Hash::make('12345678'),
            'numero_compte' =>$numero_compte,
            'addresse' => $this->faker->address(),
            'created_at' => $this->faker->dateTimeInInterval(),
            'users_id' => $user,
            'compte_bancaire_categorie_id' => $compte_categorie,
            'status_compte_id' => $status_compte
        ];
    }
}
